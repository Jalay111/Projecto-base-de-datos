<?php
$usuario = $_POST['nnombre'];
$pass = $_POST['npassword'];
 
if(empty($usuario) || empty($pass)){
    header("Location: index.php");
    exit();
}
 
mysql_connect('127.0.0.1','root','') or die("Error al conectar " . mysql_error());
mysql_select_db('ventas_servicios') or die ("Error al seleccionar la Base de datos: " . mysql_error());
 
$result = mysql_query("SELECT * from usuarios where Email='" . $usuario . "'");
 
if($row = mysql_fetch_array($result)){
    if($row['password'] == $pass){
        session_start();
        $_SESSION['Email'] = $usuario;
        header("Location: inicio.php");
    }else{
        echo "Usuario o contraseña incorrecta";
        header("Location: index.php");
        exit();
    }
}else{
    echo "Usuario no registrado";
    header("Location: index.php");
    exit();
}
 
 
?>