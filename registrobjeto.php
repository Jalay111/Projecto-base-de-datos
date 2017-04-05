<?php require_once("seguridad.php");?>
<!DOCTYPE HTML>
<html lang: es>
  <head>
    <meta charset="utf-8">
    <title>Registrar Objeto</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="valida/css/registrobjeto.css" media="screen" />
    <script language="javascript" type="text/javascript" src="logica.js"></script>
    <link rel="stylesheet" href="valida/css/style.css"/>
    <link rel="stylesheet" href="valida/css/scrollbar.css"/>
    <script language="javascript">
      function mostrar(_visibiidad ,parametro){
        document.getElementById(parametro).style.visibility=_visibiidad;
      }
    </script>
  </head>
  
  
  <body>
    <form name="Registrar_Objeto" action="Untitled1.php" method="POST">
      <HR>
      <a id="icon_ver" href="javascript:mostrar('visible', 'contenedor');"><i class="icon icon-eye"></i></a>
      <h1>Registrar Objeto</h1>
      <input id="descripcion" type="text" name="descripcion" max-length="50" placeholder="Descripcion"/>
      <input id="tiempo" type="number" name="tiempo" max-length="20" placeholder="Tiempo Mantenimiento (meses)"/>
      <input id="cliente" type="number" name="cliente" max-length="20" placeholder="idCliente"/>
      <button type="submit" onclick="validarForm(Registrar_Servicio)";>Registrar</button>
    </form>
    
    <div id="contenedor" class="container">
    <div class="row">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Id Cliente</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Cedula</th>
            <th>Correo</th>
          </tr>
        </thead>
        <tbody>
          <?php
            session_start();
            include("cox.php");  
            $cedula=$_POST ['busco'];
            $con=mysql_connect($host,$user,$pw)or die ("problema al conectar");	
            mysql_select_db($db,$con) or die ("problema al conectar la base de datos");
            $result = mysql_query("SELECT * FROM cliente WHERE CedulaC like '%$cedula%'"); 
            while ($row=mysql_fetch_array($result)) {
              echo '<tr>';
              echo '<td>'. $row['idCliente'] . '</td>';
              echo '<td>'. $row['NombreC'] . '</td>';
              echo '<td>'. $row['ApellidoC'] . '</td>';
              echo '<td>'. $row['DireccionC'] . '</td>';
              echo '<td>'. $row['TelefonoC'] . '</td>';
              echo '<td>'. $row['CedulaC'] . '</td>';
              echo '<td>'. $row['CorreoC'] . '</td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div> <!-- /container -->
  </body>
</html>