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
    <title>Objetos</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script> 
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/css/menu.css"/>
    <link rel="stylesheet" href="styles/css/style.css"/>
    <link rel="stylesheet" href="styles/css/objetos.css"/>
    <link rel="stylesheet" href="styles/css/scrollbar.css"/>
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
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
  <h1>Objetos</h1>
  <div id="buscar">
    <form action="" method="POST" name="search" id="search-form">
      <input type="texto" name="busco" max-length="20" placeholder="Buscar"/>
      <button href="objetos.php"><i class="icon icon-magnifying-glass"></i></button>
    </form>
    <?php
      if($_SESSION['TipoUsuario'] == 1){ 
        echo '<a id="icon_agregar" href="javascript:mostrar();"><i class="icon icon-add-to-list"></i></a>';
      } 
    ?>
  </div>
  <div id="contenedor_tabla_objeto" class="container">
    <div id="objeto_tabla" class="row">
      <table class="table table-striped table-hover">
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
            $result = mysql_query("SELECT * FROM cliente inner join maquina ON idCliente = Cliente_idCliente WHERE cedulaC like '%$cedula%'");
            while ($row=mysql_fetch_array($result)) {
              echo '<tr>';
              echo '<td>'. $row['idMaquina'] . '</td>';
              echo '<td>'. $row['DescripcionM'] . '</td>';
              echo '<td>'. $row['FechaMantenimientoM'] . '</td>';
              echo '<td>'. $row['FechaProxMantenimientoM'] . '</td>';
              echo '<td>'. $row['NombreC'] . '</td>';
              echo '<td>'. $row['CedulaC'] . '</td>'; 
              //echo '<td><a href="logout.php"><i class="icon icon-edit"></i></a></td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div> <!-- /container -->
  
  <div id="ventana">
    <form id="formularioventana" name="Registrar_Objeto" action="validar/validarobjeto.php" method="POST">
      <h1 id="tituloregistrar">Registrar Objeto</h1>
      <input id="descripcion" type="text" name="descripcion" max-length="50" placeholder="Descripcion" required/>
      <input id="tiempo" type="number" name="tiempo" max-length="20" placeholder="Tiempo Mantenimiento (meses)" required/>
      <input id="cliente" type="number" name="cliente" max-length="20" placeholder="Cedula Cliente" required/>
      <button id="registrar" type="submit">Registrar</button>
      <a id="icon_cerrar" href="javascript:cerrar();"><i class="icon icon-cross"></i></a>
    </form>
  </div>
  
</body>
</html>
