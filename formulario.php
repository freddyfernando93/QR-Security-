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
<h1>Registro de Ingreso</h1>
<form action="registrar_c.php" method="post"> 
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
    <td>Acceso</td>
    <td><input type="text" name= "acceso" /></td>
  </tr>
  <tr>
    <td>MAC Address</td>
    <td><input type="text" name= "mac" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value= "Registrar" /></td>
  </tr>
</table>

</body>
</html>