<?php 
session_start();
include("conexion.php ");
if(isset($_POST ['nombre']) && !empty($_POST ['nombre']) &&
isset($_POST ['apellido']) && !empty($_POST ['apellido']) &&
isset($_POST ['acceso']) && !empty($_POST ['acceso']) &&
isset($_POST ['mac']) && !empty($_POST ['mac']))
 { $con= mysql_connect($host,$user,$pw)
 or die ("problemas al conectar con el servidor");
	mysql_select_db($db,$con)
	or die ("problemas al conectar db"); 
	mysql_query("INSERT INTO `bd_sistemadeseguridad`.`usuario` (`id`, `Nombre`, `Apellido`, `MAC_Address`, `NivelAcceso`, `AdminLogin_idAdminLogin`) 
	VALUES (NULL,'$_POST[nombre]','$_POST[apellido]','$_POST[mac]','$_POST[acceso]','1')",$con); 
	echo "<h2>Datos Insertados</h2><br>";
	echo "Nombre:".$_POST['nombre']."<br>";
	echo "Apellido:".$_POST['apellido']."<br>";
	echo "Acceso:".$_POST['acceso']."<br>";
	echo "Mac Address:".$_POST['mac']."<br>"; 
	echo "<br><a href=admin_page.php> Volver </a>";
	
	 }else 
	 {echo "verifica que llenaste los campos";}
 
?>