<?php 
session_start();
include("conexion.php ");
if(isset($_POST ['nombre']) && !empty($_POST ['nombre']) &&
isset($_POST ['apellido']) && !empty($_POST ['apellido']))
 { $con= mysql_connect($host,$user,$pw)
 or die ("problemas al conectar con el servidor");
	mysql_select_db($db,$con)
	or die ("problemas al conectar db"); 
	mysql_query("DELETE FROM `bd_sistemadeseguridad`.`usuario` WHERE `usuario`.`Nombre` = '$_POST[nombre]' AND `usuario`.`Apellido` = '$_POST[apellido]' ",$con); 
	echo "<h2>Datos Borrados:</h2><br>";
	echo "Nombre:".$_POST['nombre']."<br>";
	echo "Apellido:".$_POST['apellido']."<br>";
	echo "<br><a href=admin_page.php> Volver </a>";
	
	 }else 
	 {echo "Usuario Inexistente o Formulario incompleto";
	  echo "<br><a href=admin_page.php> Volver </a>";}
 
?>