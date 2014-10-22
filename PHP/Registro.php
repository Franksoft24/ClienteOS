<!DOCTYPE HTML>
<html lang="ES-es, EN-us">
<head>
	<meta charset="utf-8">
    <meta name="description" content="this is a travel agence.">
    <meta name="keywords" content="Travel">
    <meta name="keywords" content="Viaje">
    <meta name="keywords" content="Winter travel">
    <meta name="keywords" content="Viaje de invierno">
    <meta name="keywords" content="ChapiTravel-registro">
    <title>Chapi Travel / Registro</title>
    <link rel="icon" href="../Image/Favicon/favicon.png">
    <link rel="stylesheet" type="text/css" href="../Css/Reset.css">
    <link rel="stylesheet" type="text/css" href="../Css/Style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto|Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="../Script/Posts.js"></script>
    <script type="text/javascript" src="../Script/Script.js"></script>
</head>
<body>
	<nav>
    	<ul>
        	<a href="#"><li>Acceder</li></a>
            <a href="#"><li>Registrarse</li></a>
        </ul>
    </nav>
	<header>
    	<div id="logo"><img src="../Image/chappi travels.png" alt="logo.png" width="100%"></div>
        <div id="social">
        	<ul>
            	<a href="#"><li><img alt="facebook.svg" src="../Image/svg/facebook7.svg" width="25px"></li></a>
            	<a href="#"><li><img alt="twitter.svg" src="../Image/svg/social71.svg" width="25px"></li></a>
            </ul>
        </div>
        <h1><a href="../Index.php">Chapi Travel</a></h1>
    </header>
    <nav id="menu_secundario">
    	<ul class="nav">
        	<a href="../Index.php"><li>inicio</li></a>
            <a href="#"><li>acerca</li></a>
            <a href="#"><li>contacto</li></a>
            <a href="#"><li>politicas</li></a>
        </ul>
    </nav>
    <section class="formRegistro">
    	<center><div id="form-singup">
        	<h1>Registrarse</h1>
            <form action="save_user.php" method="post">
            	<table>
                	<tr>
                        <td colspan="2"><input type="text" name="nombre" id="username" placeholder="Nombre" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" name="pApellido" id="pApellido" placeholder="Primer apellido" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" name="sApellido" id="sApellido" placeholder="Segundo apellido"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" name="DNI" id="DNI" placeholder="DNI o pasaporte" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="tel" name="telefono" id="telefono" placeholder="Telefono" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" name="direccion" id="direccion" placeholder="Direccion" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        	<select name="Pais" id="Pais" required>
                            	<option value="" selected>Pais</option>
                            	<script type="text/javascript">
									/*Esperar que me envien la lista de los paises*/
                                </script>
                        	</select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        	<select name="Ciudad" id="Ciudad"  required>
                            	<option value="" selected>Ciudad</option>
                            	<script type="text/javascript">
									/*Esperar que me envien la lista de las ciudades*/
                                </script>
                        	</select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="email" name="correo" id="correo" placeholder="Correo" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="password" name="password" id="password" placeholder="Contraseña" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="password" name="rpassword" id="rpassword" placeholder="Repetir contraseña" required></td>
                    </tr>
                    <tr>
                    	<td><input type="submit" value="Aceptar" class="aceptar"></td>
                        <td><input type="reset" value="Cancelar" class="cancelar"></td>
                    </tr>
                </table>
            </form>
        </div></center>
    </section>
    <footer>
    	<h6>Desarrollado por chapisoft.</h6>
    </footer>
</body>
</html>