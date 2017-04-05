<?php 
  require_once("validar/sesionactiva.php");
  session_start(); 
  include("validar/cox.php");  
  $con=mysql_connect($host,$user,$pw)or die ("problema al conectar");	
  mysql_select_db($db,$con) or die ("problema al conectar la base de datos");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Orden de Compra</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/css/menu.css"/>
    <link rel="stylesheet" href="styles/css/style.css"/>
    <link rel="stylesheet" href="styles/css/orden_compra.css"/>
    <link rel="stylesheet" href="styles/css/scrollbar.css"/>
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
</head>

<body>
  <header>
  <nav>
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
      <a href="logout.php"><i class="icon icon-log-out"></i></a>
  </div>
  </header>
  <h1>Ordenes de Compra</h1>

  <div id="buscar">
    <form action="" method="POST" name="search" id="search-form">
      <input type="number" name="busco" max-length="20" placeholder="Buscar id Orden"/>
      <button href="orden_compra.php"><i class="icon icon-magnifying-glass"></i></button>
    </form>
    <?php
      if($_SESSION['TipoUsuario'] == 1){ 
        echo '<a id="icon_agregar" href="registrorden_compra.php"><i class="icon icon-add-to-list"></i></a>';
      } 
    ?>
  </div>
  <div class="container">
    <div class="row">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Id Orden</th>
            <th>Estado</th>
            <th>Nombre Proveedor</th>
            <th>Direccion Proveedor</th>
            <th>Telefono Proveedor</th>
            <th>Fecha Orden</th>
            <th>Fecha Entrega</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $result = mysql_query("SELECT * FROM orden INNER JOIN proveedor ON idProveedor = Proveedor_idProveedor WHERE idOrden LIKE '%$orden%'");
            if($result == NULL){
              echo '<div id="resultadonegativo"><a>no hay resultados para esta busqueda</a></div>';
            }
            while ($row=mysql_fetch_array($result)) {
              echo '<tr>';
              echo '<td>'. $row['idOrden'] . '</td>';
              echo '<td>'. $row['Estado'] . '</td>';
              echo '<td>'. $row['NombreP'] . '</td>';
              echo '<td>'. $row['DireccionP'] . '</td>';
              echo '<td>'. $row['TelefonoP'] . '</td>';
              echo '<td>'. $row['FechaOrden'] . '</td>';
              echo '<td>'. $row['FechaEntrega'] . '</td>';
              echo '<td><a href="logout.php"><i class="icon icon-list">ver Orden</i></a></td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div> <!-- /container -->
</body>
</html>
