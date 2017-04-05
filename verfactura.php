<?php 
  include("validar/conexion_bbdd.php");
  $idFactura=$_GET['id'];
  $result = mysql_query("SELECT * FROM factura WHERE idFactura='$idFactura'");
  $row=mysql_fetch_array($result);
  $idFactura=$row['idFactura'];
  $idCliente=$row['Cliente_idCliente'];
  $Trabajador=$row['Trabajador_idTrabajador'];
  $Fecha=$row['Fecha'];
  
  $result = mysql_query("SELECT * FROM cliente WHERE idCliente='$idCliente'");
  $row=mysql_fetch_array($result);
  $Nombre=$row['NombreC'];
  $Apellido=$row['ApellidoC'];
  $Cedula=$row['CedulaC'];
  
  $result = mysql_query("SELECT * FROM maquina WHERE Cliente_idCliente='$idCliente'");
  $row=mysql_fetch_array($result);
  $Maquina=$row['DescripcionM'];
  
  $result = mysql_query("SELECT * FROM trabajador WHERE idTrabajador='$Trabajador'");
  $row=mysql_fetch_array($result);
  $Trabajador=$row['NombreT'];
?>


<!DOCTYPE html>
<html>
  <head>
    <title>ver Factura</title> 
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="styles/css/verfactura.css"/>
    <link rel="stylesheet" href="styles/css/scrollbar.css"/>
    <link rel="stylesheet" href="styles/css/style.css"/>
    <link>
  </head>
  
  <body>
    <h1>Detalle Factura</h1>
    <hr id="hr1">
    <hr id="hr2">
    <div id="nombre"><p><i>Nombre: </i><?php echo $Nombre." ".$Apellido?></p></div>
    <div id="id"><p><i># </i><?php echo $idFactura?></p></div>
    <div id="fecha"><i>Fecha: </i><p><?php echo $Fecha?></p></div>
    <div id="cedula"><i>Cedula: </i><p><?php echo $Cedula?></p></div>
    <div id="objeto"><i>Objeto: </i><p><?php echo $Maquina?></p></div>
    
    <div id="tabla">
      <div id="factura_tabla" class="row">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Descricion</th>
              <th>Precio</th>
              <th>Cantidad</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $result = mysql_query("SELECT * FROM detallefactura 
                                    INNER JOIN productoservicio ON ProductoServicio_idProductoServicio = idProductoServicio 
                                    WHERE Factura_idFactura='$idFactura'"); 
              while ($row=mysql_fetch_array($result)) {
                echo '<tr>';
                echo '<td>'. $row['NombrePS'] . '</td>';
                echo '<td>'. $row['DescripcionPS'] . '</td>';
                echo '<td>'. $row['ValorUnitario'] . '</td>';
                echo '<td>'. $row['Cantidad'] . '</td>';
                echo '</tr>'; 
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    
    <div id="precios">
      <?php
        $result = mysql_query("SELECT * FROM detallefactura WHERE Factura_idFactura='$idFactura'");
        $suma=0;
        while ($row=mysql_fetch_array($result)) {
                $suma+=$row['ValorUnitario'];
        }
        echo "Subtotal: ".($suma-($suma*0.16))."<br>";
        echo "iva: ".($suma*0.16)."<br>";
        echo "total: ".$suma;
      ?>
    </div>
  </body>
</html>