<?php 
  include("validar/conexion_bbdd.php");
  
  $cedula=$_POST ['cedula'];
  $_SESSION['cedula']=$cedula;
  $result = mysql_num_rows(mysql_query("SELECT * FROM cliente WHERE cedulaC='$cedula'"));
  if($result == 0){
    echo '<script language="javascript">alert("Cedula no existente, Registrar Cliente");window.location="clientes.php";</script>';
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Facturacion</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/css/menu.css"/>
    <link rel="stylesheet" href="styles/css/style.css"/>
    <link rel="stylesheet" href="styles/css/facturacion1.css"/>
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
      function enviarCedula(){
        var cedula = document.getElementById('cedula').value;
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
  <h1>Facturacion</h1>

  <div id="buscar">
    <form action="" method="POST" name="search" id="search-form">
      <input type="texto" name="busco" max-length="20" placeholder="Buscar"/>
      <button href="facturacion.php"><i class="icon icon-magnifying-glass"></i></button>
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
            <th>Id Factura</th>
            <th>Fecha</th>
            <th>Nombre Cliente</th>
            <th>Cedula Cliente</th>
            <th>Descripcion de Objeto</th>
            <th>Nombre Trabajador</th>
            <th>Telefono Trabajador</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $result = mysql_query("SELECT * FROM cliente inner join factura ON idCliente = Cliente_idCliente inner join maquina ON idMaquina = Maquina_idMaquina inner join trabajador ON idTrabajador = Trabajador_idTrabajador WHERE CedulaC like '%$cedula%'"); 
            while ($row=mysql_fetch_array($result)) {
              echo '<tr>';
              echo '<td>'. $row['idFactura'] . '</td>';
              echo '<td>'. $row['Fecha'] . '</td>';
              echo '<td>'. $row['NombreC'] . '</td>';
              echo '<td>'. $row['CedulaC'] . '</td>';
              echo '<td>'. $row['DescripcionM'] . '</td>';
              echo '<td>'. $row['NombreT'] . '</td>';
              echo '<td>'. $row['TelefonoT'] . '</td>';
              echo '<td><a href="logout.php"><i class="icon icon-list">ver Factura</i></a></td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div> <!-- /container -->
  
  <div id="ventana">
    <form id="formularioventana" name="Registrar_Factura" action="prueba.php" method="post">
      <h1 id="tituloregistrar">Crear Factura</h1>
      <input id="cedula" type="number" name="cedula" value="<?php echo $cedula ?>" disabled/>
      <button id="continuar" class="btn btn-info" disabled>continuar</button>
      
      <select id="objeto" name="objeto">
      <?php
        $cedula=$_POST['cedula'];
        $result = mysql_query("SELECT * FROM cliente INNER JOIN maquina ON idCliente = Cliente_idCliente WHERE CedulaC='$cedula'"); 
        while ($row=mysql_fetch_array($result)) {
          echo '<option name="objeto" value"'.$row['idMaquina'].'">'.$row['DescripcionM'].'</option>';
        }
      ?>
      </select>
      
      <select id="trabajador" name="trabajador">
        <?php
          $cedula=$_POST['cedula'];
          $result = mysql_query("SELECT * FROM trabajador"); 
          while ($row=mysql_fetch_array($result)) {
            echo '<option name="trabajador" value"'.$row['idTrabajador'].'">'.$row['NombreT'].'</option>';
          }
        ?>
      </select>
    
      <button type="submit" class="btn btn-info" href="">Registrar Factura</button>
      <a id="icon_cerrar" href="facturacion.php"><i class="icon icon-cross"></i></a>
      <i id="factura" class="icon icon-documents"></i>
    </form>
  </div>
  
</body>
</html>
