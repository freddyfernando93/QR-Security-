<html>
	<head>
		<titl></titl>
		<link 	rel="stylesheet"
		type="text/css"
		href="styles.css"> 
	</head>
	<body>
		<?php
		session_start();
		include("conexion.php");
		if(isset($_SESSION['username']))
		{
		
		echo 	"<h1>Gestion de Usuarios</h1><a href=formulario.php> Registrar Usuario</a>&nbsp;&nbsp;
				<a href=formulario_eliminar.php> Eliminar Usuario</a>&nbsp;&nbsp;
				<a href=destruir.php> Cerrar Sesion</a>
				<hr></hr>
				<p><strong>Lista de Usuarios Registrados</strong></p>";
		
		$con = mysql_connect($host,$user,$pw) or die ("problemas con server");
		mysql_select_db ($db,$con) or die ("problemas con BD");

		$sel=mysql_query("SELECT Nombre,Apellido, MAC_Address FROM usuario",$con);
		echo "<table border = '1'> \n"; 
		echo "<tr><td >Nombre</td><td>Apellido</td><td>MAC_Address</td></tr> \n"; 
		while ($row = mysql_fetch_row($sel)){ //Arreglo de elementos por fila
		echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr> \n"; 
} 
		echo "</table> \n"; 

		

		}else{
		echo "no puedes ver esta pagina";
		}
		?>
	</body>
</html>
