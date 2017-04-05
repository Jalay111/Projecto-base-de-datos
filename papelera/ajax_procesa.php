<?php 
  require_once("validar/sesionactiva.php");
  session_start(); 
  include("validar/cox.php");  
  $con=mysql_connect($host,$user,$pw)or die ("problema al conectar");	
  mysql_select_db($db,$con) or die ("problema al conectar la base de datos");
  
  $cedula = $_POST['objeto_cedula']
  $sql = "SELECT * FROM maquina inner join cliente ON idCliente = Cliente_idCliente WHERE CedulaC='$cedula'";
  $consulta = mysql_query($sql)
  
  while($row = mysql_fetch_array($consulta)){
   echo "<option value=\"".$row['idMaquina']."\">".utf8_encode($row['DescripcionM'])."</option>"
  }
?>