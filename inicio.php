<?php require_once("validar/sesionactiva.php");
//require_once("seguridad.php")?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="styles/css/inicio.css"/>
    <link rel="stylesheet" href="styles/css/style.css"/>
    <link rel="stylesheet" href="styles/css/content.css"/>
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <div id="imagen"><IMG SRC="styles/imagenes/logo_centrado.png"></div>

    <div class="cerrar">
      <a href="validar/logout.php"><i class="icon icon-log-out"></i></a>
    </div>

    <div id="content">
      <a id="caja" href="servicios.php">
        <div id="BoxS">
          <a id="text" href="servicios.php"><i class="icon icon-flash"></i></a>
          <a id="Cajam" href="servicios.php"><span>Servicios</span></a>
        </div>
      </a>

      <a id="caja" href="productos.php">
        <div id="BoxP">
          <a id="text" href="productos.php"><i class="icon icon-price-tag"></i></a>
          <a id="Cajam" href="productos.php"><span>Productos</span></a>
        </div>
      </a>

      <a id="caja" href="facturacion.php">
        <div id="BoxF">
          <a id="text" href="facturacion.php"><i class="icon icon-documents"></i></a>
          <a id="Cajam" href="facturacion.php"><span>Facturacion</span></a>
        </div>
      </a>

      <a id="caja" href="clientes.php">
        <div id="BoxC">
          <a id="text" href="clientes.php"><i class="icon icon-users"></i></a>
          <a id="Cajam" href="clientes.php"><span>Clientes</span></a>
        </div>
      </a>

      <a id="caja" href="objetos.html">
        <div id="BoxO">
          <a id="text" href="objetos.php"><i class="icon icon-briefcase"></i></a>
          <a id="Cajam" href="objetos.php"><span>Objetos</span></a>
        </div>
      </a>

      <a id="caja" href="orden_compra.php">
        <div id="BoxOr">
          <a id="text" href="orden_compra.php"><i class="icon icon-tag"></i></a>
          <a id="Cajam" href="orden_compra.php"><span>Orden de Compra</span></a>
        </div>
      </a>
      
      <a id="caja" href="mantenimiento.php">
        <div id="BoxM">
          <a id="text" href="mantenimiento.php"><i class="icon icon-tools"></i></a>
          <a id="Cajam" href="mantenimiento.php"><span>Mantenimiento</span></a>
        </div>
        <div id="encima"></div>
      </a>
    </div>
  </body>
</html>
