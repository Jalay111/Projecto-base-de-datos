<?php require_once("validar/sesionactiva.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Clientes</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/css/menu.css"/>
    <link rel="stylesheet" href="styles/css/style.css"/>
    <link rel="stylesheet" href="styles/css/clientes.css"/>
    <link rel="stylesheet" href="styles/css/scrollbar.css"/>
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <script language="javascript">
      function mostrar(){
        document.getElementById('ventana').style.visibility='visible';
        document.getElementById('ventana').style.transition='width';
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
  <h1>Clientes</h1>

  <div id="buscar">
    <form action="" method="POST" name="search" id="search-form">
      <input type="number" name="busco" max-length="20" placeholder="Cedula"/>
      <button href="servicios.php"><i class="icon icon-magnifying-glass"></i></button>
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
            include("validar/cox.php");  
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
              //echo '<td><a href="logout.php"><i class="icon icon-edit"></i></a></td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div> <!-- /container -->
  
  <div id="ventana">
    <form id="formularioventana" name="Registrar_Servicio" action="validar/validarcliente.php" method="POST">
      <h1 id="tituloregistrar">Registrar Cliente</h1>
      <input id="nombre" type="text" name="nombre"max-length="20" placeholder="Nombre" required/>
      <input id="apellido" type="text" name="apellido" max-length="20" placeholder="Apellido" required/>
      <input id="direccion" type="text" name="direccion" max-length="20" placeholder="Direccion" required/>
      <input id="telefono" type="number" name="telefono" max-length="20" placeholder="Telefono" required/>
      <input id="cedula" type="number" name="cedula" max-length="20" placeholder="Cedula" required/>
      <input id="correo" type="email" name="correo" max-length="20" placeholder="Correo" required/>
      <button id="registrar" type="submit">Registrar</button>
      <a id="icon_cerrar" href="javascript:cerrar();"><i class="icon icon-cross"></i></a>
    </form>
  </div>
  
</body>
</html>
