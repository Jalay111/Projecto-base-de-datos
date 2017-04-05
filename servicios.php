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
    <title>Servicios</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/css/menu.css"/>
    <link rel="stylesheet" href="styles/css/style.css"/>
    <link rel="stylesheet" href="styles/css/servicios.css"/>
    <link rel="stylesheet" href="styles/css/scrollbar.css"/>
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <script language="javascript">
      function mostrar(){
        document.getElementById('ventana').style.visibility='visible';
      }
      function cerrar(){
        document.getElementById('ventana').style.visibility='hidden';
      }
    </script>
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
      <!--<li><a href="orden_compra.php"><span class=""><i class="icon icon-tag"></i></span>Orden de Compra</a></li>-->
    </ul>
  </nav>
  <div class="cerrar">
      <a href="validar/logout.php"><i class="icon icon-log-out"></i></a>
  </div>
  </header>
  <h1>Servicios</h1>

  <div id="buscar">
    <form action="" method="POST" name="search" id="search-form">
      <input type="texto" name="busco" max-length="20" placeholder="Buscar"/>
      <button id="icon_buscar" href="servicios.php"><i class="icon icon-magnifying-glass"></i></button>
    </form>
    <?php
      if($_SESSION['TipoUsuario'] == 1){ 
        echo '<a id="icon_agregar" href="javascript:mostrar();"><i class="icon icon-add-to-list"></i></a>';
      } 
    ?>
  </div>
  <div class="container">
    <div class="row">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Id Servicio</th>
            <th>Nombre</th>
            <th>Descricion</th>
            <th>Precio</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $busqueda=$_POST ['busco'];
            $result = mysql_query("SELECT * FROM productoservicio WHERE TipoPS='2'and NombrePS like '%$busqueda%' 
            or TipoPS='2'and idProductoServicio like '%$busqueda%' or TipoPS='2'and DescripcionPS like '%$busqueda%' 
            or TipoPS='2'and PrecioPS like '%$busqueda%'"); 
            while ($row=mysql_fetch_array($result)) {
              echo '<tr>';
              echo '<td>'. $row['idProductoServicio'] . '</td>';
              echo '<td>'. $row['NombrePS'] . '</td>';
              echo '<td>'. $row['DescripcionPS'] . '</td>';
              echo '<td>'. $row['PrecioPS'] . '</td>';
              if($_SESSION['TipoUsuario'] == 1){ 
                //echo '<td><a href="javascript:mostrar();"><i class="icon icon-edit"></i></a></td>';
              }
              echo '</tr>'; 
            }
          ?>
        </tbody>
      </table>
    </div>
  </div> <!-- /container -->
  
  <div id="ventana">
    <form id="formularioventana" name="Registrar_Servicio" action="validar/validarservicio.php" method="POST">
      <h1 id="tituloregistrar">Registrar Servicio</h1>
      <input id="nombre" type="text" name="nombre" max-length="20" placeholder="Nombre del Servicio" required/>
      <input id="descripcion" type="text" name="descripcion" max-length="20" placeholder="Descripcion" required/>
      <input id="precio" type="number" name="precio" max-length="20" placeholder="precio" required/>
      <button id="registrar" type="submit" onclick="validarForm(Registrar_Servicio);">Registrar/acualizar</button>
      <a id="icon_cerrar" href="javascript:cerrar();"><i class="icon icon-cross"></i></a>
    </form>
  </div>
  
</body>
</html>
