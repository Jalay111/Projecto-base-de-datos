<?php 
  include("validar/conexion_bbdd.php");
  
  $rs = mysql_query("SELECT MAX(idFactura) FROM factura");
  if ($row = mysql_fetch_row($rs)) {
    $idFactura = trim($row[0]);
  }
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Registro Factura</title> 
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/css/registrofactura.css"/>
    <link rel="stylesheet" href="styles/css/scrollbar.css"/>
    <link rel="stylesheet" href="styles/css/style.css"/>
    <link>
  </head>
  
  <body>
    <hr id="hr1">
    <hr id="hr2">
    <h1>Registro Factura</h1>
    
    <div id="tabla1" class="container">
    <div class="row">
      <table class="table table-striped table-hover table-condensed">
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
            $result = mysql_query("SELECT * FROM productoservicio WHERE TipoPS='2'"); 
            while ($row=mysql_fetch_array($result)) {
              echo '<tr>';
              echo '<td>'. $row['idProductoServicio'] . '</td>';
              echo '<td>'. $row['NombrePS'] . '</td>';
              echo '<td>'. $row['DescripcionPS'] . '</td>';
              echo '<td>'. $row['PrecioPS'] . '</td>';
              echo '<td><a id="agregar" href="validar/agregar.php?id='.$row['idProductoServicio'].'&idFactura='.$idFactura.'" name="agregar" class="icon icon-shopping-cart"></a></td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div> <!-- /container -->
    <div id="tabla2" class="container">
    <div class="row">
      <table class="table table-striped table-hover table-condensed">
        <thead>
          <tr>
            <th>Id Producto</th>
            <th>Nombre</th>
            <th>Descricion</th>
            <th>Precio</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $busqueda=$_POST ['busco'];
            $result = mysql_query("SELECT * FROM productoservicio WHERE TipoPS='1'"); 
            while ($row=mysql_fetch_array($result)) {
              echo '<tr>';
              echo '<td>'. $row['idProductoServicio'] . '</td>';
              echo '<td>'. $row['NombrePS'] . '</td>';
              echo '<td>'. $row['DescripcionPS'] . '</td>';
              echo '<td>'. $row['PrecioPS'] . '</td>';
              echo '<td><a id="agregar" href="validar/agregar.php?id='.$row['idProductoServicio'].'&idFactura='.$idFactura.'" name="agregar" class="icon icon-shopping-cart"></a></td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div> <!-- /container -->
  
  <a id="Confirmar" href="facturacion.php" name="confirmar" class="icon icon-check"></a>
  
  </body>
</html>