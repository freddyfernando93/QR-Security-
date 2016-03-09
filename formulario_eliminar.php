<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link 	rel="stylesheet"
		type="text/css"
		href="styles.css"> 
</head>

<body>
<?php
		echo "<h1>Eliminar Usuario</h1><hr></hr><h2>Usuarios Registrados</h2>";
		session_start();
		include("conexion.php");
		if(isset($_SESSION['username']))
		{	
		$con = mysql_connect($host,$user,$pw) or die ("problemas con server");
		mysql_select_db ($db,$con) or die ("problemas con BD");

		$sel=mysql_query("SELECT Nombre,Apellido, MAC_Address FROM usuario",$con);
		echo "<table border = '1'> \n"; 
		echo "<tr><td>Nombre</td><td>Apellido</td><td>MAC Address</td></tr> \n"; 
		while ($row = mysql_fetch_row($sel)){ 
		echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr> \n"; 
} 
		echo "</table> \n"; 
		}else{
		echo "no puedes ver esta pagina";
		}
		?>
<br></br>
<form action="eliminar.php" method="post"> 
<table width="200" border="1">
  <tr>
    <td>Nombre</td>
    <td><input type="text" name= "nombre" /></td>
  </tr>
  <tr>
    <td>Apellido</td>
    <td><input type="text" name= "apellido" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value= "Eliminar" /></td>
  </tr>
</table>

</body>
</html>