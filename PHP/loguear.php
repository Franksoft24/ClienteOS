<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Logueando...</title>
	<link rel="icon" href="../Image/Favicon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../Css/Reset.css">
    <style>
    	#body
		{
			background-color:#27ae60;
			background-image:url(../Image/progress.gif);
			background-position:top left;
			background-size:100%;
			background-attachment:fixed;
			position:absolute;
			height:-moz-calc(100%);
			height:-webkit-calc(100%);
			height:-o-calc(100%);
			height:-ms-calc(100%);
			height:calc(100%);
			width:-moz-calc(100%);
			width:-webkit-calc(100%);
			width:-o-calc(100%);
			widtht:-ms-calc(100%);
			width:calc(100%);
		}
		
    </style>
</head>
<body>
<div id="body">
	<?php
		
		include("conection.php");
		session_start();
		$conection = mysql_connect($host, $user, $password);
		$dbselector = mysql_select_db($db,$conection);
		if (!$conection || !$dbselector){
			echo "<script type='text/javascript'>
				alert('Error al conectar la base de datos')
				location.href='Log-in.php'	
			</script>";
		}else{
			$user = mysql_query("SELECT Correo,PW,Rol,DocumentoIdentidad FROM usuarios WHERE Correo = '$_POST[correo]'", $conection);
			/*$pw = mysql_query("Select Clave FROM usuarios WHERE Correo = '$_POST[correo]')", $conection);
			$user_type = mysql_query("Select Rol FROM usuarios WHERE Correo = '$_POST[correo]')", $conection);*/
			
			$sesion = mysql_fetch_array($user);/*Eso es para seleccionar el registro donde el correo coinside. lo de user no hacer caso*/
			if ($sesion['PW'] == $_POST['password']){
				$pw = true;
				$rol = $sesion['Rol'];
				$_SESSION['username'] = $_POST['correo'];
				$_SESSION['DocumentoIdentidad'] = $sesion['DocumentoIdentidad'];
			}
			if ($pw){
				switch ($rol){
					case 1:
						header("location:Main.php");
						break;
					case 2:
						echo "Eres un empleado";
						break;
					case 3:
						echo "Eres un administrador de sistemas";
						break;
					case 4:
						echo "Eres un dios";
						break;
					default:
						echo "Nothing";
				}
				echo "<script type='text/javascript'>
					alert('Ingreso exitoso')	
				</script>";
			}else{
				/*echo "<script type='text/javascript'>
					/*alert('Error al loguear, favor intentar de nuevo.')*/
					/*location.href='Log-in.php'	
				</script>";*/
				header("location:Log-in.php");
			}
		}
		
	?>
 </div>
</body>
</html>