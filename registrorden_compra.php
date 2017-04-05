<?php require_once("seguridad.php");?>
<!DOCTYPE HTML>
<html lang: es>
  <head>
    <meta charset="utf-8">
    <title>Registrar Servicio</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="valida/css/registroservicio.css" media="screen" />
    <script language="javascript" type="text/javascript" src="logica.js"></script>
  </head>
  
  
  <body>
    <form name="Registrar_Servicio" action="Untitled1.php" method="POST">
      <HR>
      <h1>Registrar Servicio</h1>
      <input id="nombre" type="text" name="nombre" id="nombre" max-length="20" placeholder="Nombre del Servicio"/>
      <input id="descripcion" type="text" name="descripcion" max-length="20" placeholder="Descripcion"/>
      <input id="precio" type="number" name="precio" max-length="20" placeholder="precio"/>
      <button type="submit" onclick="validarForm(Registrar_Servicio)";>Registrar</button>
    </form>
  </body>
</html>