<?php

$datos= $_POST['scan'];
$mac= $_POST['mac'];
date_default_timezone_set('US/Arizona');
session_start();
include("conexion.php ");
$con= mysql_connect($host,$user,$pw) or die ("problemas al conectar con el servidor");
mysql_select_db($db,$con)
	or die ("problemas al conectar db"); 
	$sel=mysql_query("SELECT Nombre, Apellido, MAC_Address, NivelAcceso FROM usuario WHERE MAC_Address='$_POST[mac]'",$con); 
	$sesion=mysql_fetch_array($sel);
	$nivel = $sesion['NivelAcceso'];
	$nombreCompleto= $sesion['Nombre']." ".$sesion['Apellido'];
	if($mac == $sesion['MAC_Address']){
		
		switch ($nivel) {
    case 1:
		//Acceso a todas las entradas: ejecutar accion del raspberry con el codigo guardado en datos
        $dep=mysql_query("SELECT nombreDep From Departamento WHERE Codigo_Entrada='$datos' OR Codigo_Salida='$datos'",$con);
        $depArray=mysql_fetch_array($dep);
        $dep2=$depArray['nombreDep']; 
		if($datos=='A1'||$datos=='B1'||$datos=='C1'||$datos=='D1'||$datos=='E1')
			{$acc="Entrada";

			 }
		else if($datos=='A2'||$datos=='B2'||$datos=='C2'||$datos=='D2'||$datos=='E2')
			{$acc="Salida";}
		$date = date('Y-m-d g:i a');
		mysql_query("INSERT INTO registro (Fecha, Entrada_Salida, Usuario, nombreDep) VALUES ('$date','$acc', '$nombreCompleto', '$dep2')",$con);		
		echo $acc." a las ".$date;

        break;
    case 2:
		//Acceso a determinadas entradas: validar con BD y ejecutar raspberry
		$dep=mysql_query("SELECT nombreDep FROM Departamento WHERE Codigo_Entrada='$datos' OR Codigo_Salida='$datos'",$con);
		$depArray=mysql_fetch_array($dep);
		$dep2=$depArray['nombreDep']; 
		if($datos=='A1'||$datos=='B1'||$datos=='C1')
		{
			$acc="Entrada";
			$date = date('Y-m-d g:i a');
mysql_query("INSERT INTO registro (Fecha, Entrada_Salida, Usuario, nombreDep) VALUES ('$date','$acc', '$nombreCompleto', '$dep2')",$con);			echo $acc;
		}


		else if($datos=='A2'||$datos=='B2'||$datos=='C2')
		{
			$acc="Salida";
			$date = date('Y-m-d g:i a');
mysql_query("INSERT INTO registro (Fecha, Entrada_Salida, Usuario, nombreDep) VALUES ('$date','$acc', '$nombreCompleto', '$dep2')",$con);			echo $acc." a las ".$date;
		}
		

		else echo "No tienes acceso a esta Zona";
		
        break;
    case 3:
		//Acceso a determinadas entradas: validar con BD y ejecutar raspberry
        $dep=mysql_query("SELECT nombreDep FROM Departamento WHERE Codigo_Entrada='$datos' OR Codigo_Salida='$datos'",$con);
        $depArray=mysql_fetch_array($dep);
        $dep2=$depArray['nombreDep']; 
		if($datos=='A1'||$datos=='B1')
		{
			$acc="Entrada";
			$date = date('Y-m-d H:i:s');
mysql_query("INSERT INTO registro (Fecha, Entrada_Salida, Usuario, nombreDep) VALUES ('$date','$acc', '$nombreCompleto', '$dep2')",$con);			echo $acc;
		}

		else if($datos=='A2'||$datos=='B2')
		{
			$acc="Salida";
			$date = date('Y-m-d H:i:s');
mysql_query("INSERT INTO registro (Fecha, Entrada_Salida, Usuario, nombreDep) VALUES ('$date','$acc', '$nombreCompleto', '$dep2')",$con);			echo $acc;
		}
		
		else echo "No tienes acceso a esta Zona";
        break;
}
		
		echo $sesion['Nombre']." ". $sesion ['Apellido'] ;}
	else
		echo "USUARIO NO REGISTRADO. FAVOR DIRIGIRSE AL DEPARTAMENTO DE TECNOLOGIA"

?>

