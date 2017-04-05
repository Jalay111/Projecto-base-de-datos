<?php require_once("sesionactiva.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="valida/css/menu.css"/>
    <link rel="stylesheet" href="valida/css/style.css"/>
    <link rel="stylesheet" href="valida/css/ProductoServicio.css"/>
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
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
          <li><a href="orden_compra.php"><span class=""><i class="icon icon-tag"></i></span>Orden de Compra</a></li>
        </ul>
    </nav>
    <div class="cerrar">
        <a href="logout.php"><i class="icon icon-log-out"></i></a>
      </div>
  </header>
  <h1>Servicios</h1>
  <div id="buscar">
    <form action="" method="POST" name="search" id="search-form">
      <input type="texto" name="busco" max-length="20" placeholder="Buscar"/>
      <button href="servicios.php"><i class="icon icon-magnifying-glass"></i></button>
    </form>
    <?php
      if($_SESSION['TipoUsuario'] == 1){ 
        echo '<a id="icon_agregar" href="registroservicio.php"><i class="icon icon-add-to-list"></i></a>';
      } 
    ?>
  </div>
  <div class="container">
    <div class="row">
      <br></br>
      <br></br>
      <br></br>
      <br></br>
      <br></br>
    </div>
    <div class="row">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Id Servicio</th>
            <th>Nombre</th>
            <th>Descricion</th>
            <th>Precio</th>
            <th>Cantidad</th>
          </tr>
        </thead>
        <tbody>
          <?php
            session_start();
            include("cox.php");  
            $nombre=$_POST ['busco'];
            $con=mysql_connect($host,$user,$pw)or die ("problema al conectar");	
            mysql_select_db($db,$con) or die ("problema al conectar la base de datos");
            $result = mysql_query("SELECT * FROM productoservicio WHERE Tipo='1'and Nombre like '%$nombre%'"); 
            while ($row=mysql_fetch_array($result)) {
              echo '<tr>';
              echo '<td>'. $row['idProductoServicio'] . '</td>';
              echo '<td>'. $row['Nombre'] . '</td>';
              echo '<td>'. $row['Descripcion'] . '</td>';
              echo '<td>'. $row['Precio'] . '</td>';
              echo '<td>'. $row['cantidadps'] . '</td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div> <!-- /container -->
</body>
</html>
