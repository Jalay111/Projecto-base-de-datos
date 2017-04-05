<?php
$usuario = $_POST['nnombre'];
$pass = $_POST['npassword'];
$tipo1=1;
$tipo2=2;
$tipo3=3;
$nmbre=0;
 

mysql_connect('127.0.0.1','root','') or die("Error al conectar " . mysql_error());
mysql_select_db('ventas_servicios') or die ("Error al seleccionar la Base de datos: " . mysql_error());
 
$result = mysql_query("SELECT * from usuario where bloqueo = 'N' and Email='" . $usuario . "'");
 
 if($row = mysql_fetch_array($result)){
if($row['password'] == $pass){
    if($row['TipoUsuario']==$tipo1){
    header("Location: inicio.php");  
    session_start();
$_SESSION['Name'] = $row['Name'];
$_SESSION['TipoUsuario'] = $row['TipoUsuario'];
$_SESSION['idUsuario'] = $row['idUsuario'];
$_SESSION['autentica'] = "SIP"; 
    }
    if($row['TipoUsuario']==$tipo2){
    header("Location: inicio.php");  
    session_start();
$_SESSION['Name'] = $row['Name'];
$_SESSION['TipoUsuario'] = $row['TipoUsuario'];
$_SESSION['idUsuario'] = $row['idUsuario'];
$_SESSION['autentica'] = "SIP"; 

    }
    if($row['TipoUsuario']==$tipo3){
    header("Location: inicio.php");  
    session_start();
$_SESSION['Email'] = $usuario;
$_SESSION['idUsuario'] = $row['idUsuario'];
$_SESSION['autentica'] = "SIP"; 
    }
         
}else{
$mensaje='Usuario o contraseña incorrectos.';
header("Location: index.php");
exit();
}
}else{
echo "Usuario no registrado";
echo "<a href='index.php'>Volver a Intentarlo</a>"; 
exit();
}
 ?>
 <!DOCTYPE HTML>
<html lang: es>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="valida/css/login.css" media="screen" />
  </head>
  <body>
    <form name="login" action="validar.php" method="POST">
      <HR>
      <h1>Login</h1>
      <input type="text" name="nnombre" id="nombre" max-length="20" placeholder="ingresar usuario"/>
      <input type="password" name="npassword" max-length="20" placeholder="ingresar contraseña"/>
      <button type="submit">Iniciar Sesion</button>
    </form>
    <IMG SRC="valida/imagenes/logo_centrado.png">
  </body>
</html>
