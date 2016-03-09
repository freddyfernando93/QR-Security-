<html>
	<head>
	<link 	rel="stylesheet"
			type="text/css"
			href="styles.css"> 
	</head>
	<body>
		<h2 class="fonttype">Sesion Exitosa</h2>
		<?php 
		session_start();
		include("conexion.php");
		if (isset($_POST['user']) && !empty($_POST['user']) &&
		isset($_POST['passw']) && !empty($_POST['passw']))
		{
		$con = mysql_connect($host,$user,$pw) or die ("problemas con server");
		mysql_select_db ($db,$con) or die ("problemas con BD");

		$sel=mysql_query("SELECT username,password FROM AdminLogin WHERE username='$_POST[user]'",$con);

		$sesion=mysql_fetch_array($sel);

		if($_POST['passw'] == $sesion['password']) {
		$_SESSION ['username'] = $_POST['user'];


		echo "<br ><a  href=admin_page.php> Pagina Principal</a>";

		}else{
		echo "combinacion erronea";
		}

		}else{


		echo "debes llenar todos los campos";
		}


		 ?>  
	</body>
 </html>