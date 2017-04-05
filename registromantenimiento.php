<?php require_once("validar/seguridad.php");?>
<!DOCTYPE HTML>
<html lang: es>
  <head>
    <meta charset="utf-8">
    <title>Registrar Mantenimiento</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="styles/css/style.css"/>
    <link rel="stylesheet" href="styles/css/menu.css"/>
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="styles/css/registromantenimiento.css" media="screen" />
    <script language="javascript" type="text/javascript" src="logica.js"></script>
    <script language="javascript">
      function mostrar(_visibiidad ,parametro, _visibilidad2){
        document.getElementById(parametro).style.visibility=_visibiidad;
        document.getElementById('icon_cerrar').style.visibility=_visibilidad2;
      }
    </script>
  </head>
  
  
  <body>
      <header>
      <nav disabled>
        <ul>
          <li><a href="inicio.php"><span class=""><i class="icon icon-home"></i></span>Inicio</a></li>
          <li><a href="servicios.php"><span class=""><i class="icon icon-flash"></i></span>Servicios</a></li>
          <li><a href="productos.php"><span class=""><i class="icon icon-price-tag"></i></span>Productos</a></li>
          <li><a href="facturacion.php"><span class=""><i class="icon icon-documents"></i></span>Facturacion</a></li>
          <li><a href="clientes.php"><span class=""><i class="icon icon-users"></i></span>Clientes</a></li>
          <li><a href="objetos.php"><span class=""><i class="icon icon-briefcase"></i></span>Objetos</a></li>
          <li><a href="mantenimiento.php"><span class=""><i class="icon icon-tools"></i></span>Mantenimiento</a></li>
          <li><a href="orden_compra.php"><span class=""><i class="icon icon-tag"></i></span>Orden de Compra</a></li>
        </ul>
      </nav>
      <div class="cerrar">
          <a href="validar/logout.php"><i class="icon icon-log-out"></i></a>
      </div>
      </header>
    
    <a id="icon_cerrar" href="mantenimiento.php"><i class="icon icon-cross"></i></a>
    <form name="Registrar_Servicio" action="validar/validarmantenimiento.php" method="POST">
      <HR>
      <h1>Registrar Mantenimiento</h1>
      <input id="Descripcion" type="text" name="descripcion" id="descripcion" max-length="50" placeholder="Descripcion del Mantenimiento" required/>
      <input id="Trabajador" type="number" name="trabajador" id="trabajador" max-length="50" placeholder="Id Trabajador" required/>
      <a id="icon_ver" href="javascript:mostrar('visible', 'contenedor1', 'hidden');"><i class="icon icon-eye"></i></a>
      <input id="Objeto" type="number" name="objeto" id="objeto" max-length="50" placeholder="Id Objeto" required/>
      <a id="icon_ver" href="javascript:mostrar('visible', 'contenedor2', 'hidden');"><i class="icon icon-eye"></i></a>
      <button type="submit">Registrar</button>
      
      <div class="contenedor" id="contenedor1"><div class="container">
        <div class="row">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Id Trabajador</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
              </tr>
            </thead>
            <tbody>
              <?php
                session_start();
                include("validar/cox.php");  
                $nombre=$_POST ['busco'];
                $con=mysql_connect($host,$user,$pw)or die ("problema al conectar");	
                mysql_select_db($db,$con) or die ("problema al conectar la base de datos");
                $result = mysql_query("SELECT * FROM trabajador"); 
                while ($row=mysql_fetch_array($result)) {
                  echo '<tr>';
                  echo '<td>'. $row['idTrabajador'] . '</td>';
                  echo '<td>'. $row['NombreT'] . '</td>';
                  echo '<td>'. $row['DireccionT'] . '</td>';
                  echo '<td>'. $row['TelefonoT'] . '</td>';
                  echo '</tr>';
                }
              ?>
            </tbody>
          </table>
        </div>
        <a id="icon_cerrar2" href="javascript:mostrar('hidden', 'contenedor1', 'visible');"><i class="icon icon-cross"></i></a>
      </div> <!-- /container --></div>
     
      <div class="contenedor" id="contenedor2"><div class="container">
        <div class="row">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Id Objeto</th>
                <th>Descripcion</th>
                <th>Mantenimiento</th>
                <th>Proximo Mantenimiento</th>
                <th>Nombre Propietario</th>
                <th>Cedula Propietario</th>
              </tr>
            </thead>
            <tbody>
              <?php
                session_start();
                include("validar/cox.php");  
                $cedula=$_POST ['busco'];
                $con=mysql_connect($host,$user,$pw)or die ("problema al conectar");	
                mysql_select_db($db,$con) or die ("problema al conectar la base de datos");
                $result = mysql_query("SELECT * FROM cliente inner join maquina ON idCliente = Cliente_idCliente WHERE cedulaC like '%$cedula%'");
                while ($row=mysql_fetch_array($result)) {
                  echo '<tr>';
                  echo '<td>'. $row['idMaquina'] . '</td>';
                  echo '<td>'. $row['DescripcionM'] . '</td>';
                  echo '<td>'. $row['FechaMantenimientoM'] . '</td>';
                  echo '<td>'. $row['FechaProxMantenimientoM'] . '</td>';
                  echo '<td>'. $row['NombreC'] . '</td>';
                  echo '<td>'. $row['CedulaC'] . '</td>';
                  echo '</tr>';
                }
              ?>
            </tbody>
          </table>
        </div>
        <a id="icon_cerrar2" href="javascript:mostrar('hidden', 'contenedor2', 'visible');"><i class="icon icon-cross"></i></a>
      </div> <!-- /container --></div>
      
    </form>
  </body>
</html>