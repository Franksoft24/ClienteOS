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
			$verificar_registro = mysql_query("INSERT INTO personas (DocumentoIdentidad, Nombres, PrimerApellido, SegundoApellido, Correo, Telefono) VALUES ('$_POST[DNI]','$_POST[nombre]','$_POST[pApellido]','$_POST[sApellido]','$_POST[correo]','$_POST[telefono]')",$conection) or die ("<script type='text/javascript'> alert('Cannot be register'); </script>");
			if ($verificar_registro == false){
				header("location:Registro.php");
			}
			mysql_query("Insert into usuarios(Nombre, Clave, DocumentoIdentidad, Rol) VALUES ('$_POST[nombre]','$_POST[password]','$_POST[DNI]',01)",$conection) or die ("<script type='text/javascript'> alert('user cannot be create'); </script>" .mysql_error());
			"<script type='text/javascript'>
				alert('Registrado sastifactoriamente.')
			</script>";
			header("location:Log-in.php");
		}
		
	?>
    <script type="text/javascript">
    	function mensage_error(){
			alert ('Error al registrarse.')
		}
    </script>
</body>
</html>