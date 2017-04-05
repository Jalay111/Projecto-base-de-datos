<?php 
  require_once("sesionactiva.php");
  session_start(); 
  include("cox.php");  
  $con=mysql_connect($host,$user,$pw)or die ("problema al conectar");	
  mysql_select_db($db,$con) or die ("problema al conectar la base de datos");
?>