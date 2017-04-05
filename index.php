
<!DOCTYPE HTML>
<html lang: es>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido</title>
    <link rel="" href=""/>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="styles/css/login.css" media="screen" />
  </head>
 
    <form name="login" action="validar/validar.php" method="POST">
      <HR>
      <h1>Login</h1>
      <input id="nnombre" type="email" name="nnombre" id="nombre" max-length="20" placeholder="ingresar usuario" required/>
      <input id="npassword" type="password" name="npassword" max-length="20" placeholder="ingresar contraseña" required/>
      <i id="comentario"><?php session_start(); echo $_SESSION['mensaje'];?></i>
      <button type="submit">Iniciar Sesion</button>
    </form>
    <IMG SRC="styles/imagenes/logo_centrado.png">
  </body>
</html>




