<?php
session_start();
$usuario = $_POST['nnombre'];
$pass = $_POST['npassword'];
$tipo1=1;
$tipo2=2;
$tipo3=3;
$nmbre=0;

if(empty($usuario) and empty($pass)){
    unset($_COOKIE['nnombre']);
    unset($_COOKIE['npassword']);
    $_SESSION['mensaje']="Debe llenar el formulario";
    header("Location: index.php");
}
 
mysql_connect('127.0.0.1','root','') or die("Error al conectar " . mysql_error());
mysql_select_db('ventas_servicios') or die ("Error al seleccionar la Base de datos: " . mysql_error());
 
$result = mysql_query("SELECT * from usuario where bloqueo = 'N' and Email='" . $usuario . "'");
$no = mysql_query("SELECT Bloqueo from usuario where Email='" . $usuario . "'");

if($no = 'S'){
            echo '<script language="javascript">alert("Usuario Bloqueado");window.location="index.php";</script>';
        }
        
if($row = mysql_fetch_array($result)){
    if($row['password'] == $pass){
        if($row['TipoUsuario']==$tipo1){
            header("Location:../inicio.php");  
            session_start();
            $_SESSION['Name'] = $row['Name'];
            $_SESSION['TipoUsuario'] = $row['TipoUsuario'];
            $_SESSION['idUsuario'] = $row['idUsuario'];
            $_SESSION['autentica'] = "SIP"; 
        }
        if($row['TipoUsuario']==$tipo2){
            header("Location:../inicio.php");  
            session_start();
            $_SESSION['Name'] = $row['Name'];
            $_SESSION['TipoUsuario'] = $row['TipoUsuario'];
            $_SESSION['idUsuario'] = $row['idUsuario'];
            $_SESSION['autentica'] = "SIP"; 
        }
        if($row['TipoUsuario']==$tipo3){
            header("Location: ../inicio.php");  
            session_start();
            $_SESSION['Name'] = $row['Name'];
            $_SESSION['TipoUsuario'] = $row['TipoUsuario'];
            $_SESSION['idUsuario'] = $row['idUsuario'];
            $_SESSION['autentica'] = "SIP"; 
        }
        
    }else{
        echo '<script language="javascript">alert("Contraseña Incorrecta");window.location="index.php";</script>';
        exit();
    }
}else{
    echo '<script language="javascript">alert("Usuario no registrado");window.location="index.php";</script>';
    echo "<a href='index.php'>Volver a Intentarlo</a>";
    exit();
}
 ?>