<?php 
//Reanudamos la sesión 
 session_start(); 
//Validamos si existe realmente una sesión activa o no 
if($_SESSION['TipoUsuario'] != 1)
{ 
  //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión) 
  header("Location: ../index.php"); 
  exit(); 
} 

?>
