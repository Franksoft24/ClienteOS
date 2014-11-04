<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <title>Chapi Travel / Registrando</title>
    <link rel="icon" href="../Image/Favicon/favicon.png">
    <link rel="stylesheet" type="text/css" href="../Css/Reset.css">
    <style>
    	body
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
	<?php
    	include("conection.php");
		$conection = mysql_connect($host, $user, $password) or die ("<script type='text/javascript'> alert('Error 404 base de datos not found'); </script>");
		$dbselector = mysql_select_db($db,$conection) or die ("<script type='text/javascript'> alert('Error 404 base de datos not found'); </script>");
		if (!$conection && !$dbselector){
			echo "<script type='text/javascript'> mensage_error(); </script>";
			header("location:Registro.php");
		}else{
			$verificar_registro = mysql_query("INSERT INTO `Personas`(`DocumentoIdentidad`, `Nombres`, `PrimerApellido`, `SegundoApellido`, `Telefono`, `Genero`) VALUES ('$_POST[DNI]','$_POST[nombre]','$_POST[pApellido]','$_POST[sApellido]','$_POST[telefono]','$_POST[Genero]')",$conection) or die ("<script type='text/javascript'> alert('Cannot be register'); location.href='Registro.php'; </script>");
			mysql_query("INSERT INTO `Usuarios`(`Correo`, `PW`, `DocumentoIdentidad`, `Rol`) VALUES ('$_POST[correo]','$_POST[password]','$_POST[DNI]',01)",$conection) or die ("<script type='text/javascript'> alert('user cannot be create'); location.href='Registro.php'; </script>" .mysql_error());
			echo "<script type='text/javascript'>
				alert('Registrado sastifactoriamente.')
				location.href='Log-in.php'	
			</script>";
		}
	?>
    <script type="text/javascript">
    	function mensage_error(){
			alert ('Error al registrarse.')
		}
    </script>
</body>
</html>