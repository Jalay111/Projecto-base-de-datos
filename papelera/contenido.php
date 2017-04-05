<?php

session_start();

echo "Hola, ". $_SESSION['Name'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="miesti.css">
</head>
<div class="container mlogin">
 <div id="login">
     
 <h1>Bienvenidos  <?php echo $_SESSION['Name'];echo $_SESSION['TipoUsuario']; ?> a CARD S.A.</h1>
<form name="loginform" id="loginform" action="validar.php" method="POST">
 <p>
 <label for="user_login">Nombre De Usuario<br />
 <input type="text" name="nnombre" id="nombre" class="input" value="" size="20" /></label>
 </p>
 <p>
 <label for="user_pass">Contraseña<br />
 <input type="password" name="npassword" id="password" class="input" value="" size="20" /></label>
 </p>
 <p class="submit">
 <input type="submit" name="login" class="button" value="Entrar" />
 </p>
</form>
 
</div>
