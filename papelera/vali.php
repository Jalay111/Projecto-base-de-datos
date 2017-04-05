
<?php
session_start();
$usuario = $_POST['nnombre'];
$pass = $_POST['npassword'];
$tipo1=1;
$tipo2=2;
$tipo3=3;
$nmbre=0;

if(empty($usuario) || empty($pass)){
    //echo '<script language="javascript">alert("Debe llenar el formulario");window.location="index.php";</script>';
    //joel entra a prue.php 
    //echo '<span style="color:red; font-size:12px;">Bienvenido </span>';
    //unset($_COOKIE['nnombre']);
    //unset($_COOKIE['npassword']);
    //$_SESSION['mensaje']="Debe llenar el formulario";
    //header("Location: index.php");
    //echo '<script language = javascript>
    //alert ("llene el fromulario")
    //self.location = "index.php"
    //</script>';
    echo '<span>Por favor complete todos los campos.</span>';
}
 
mysql_connect('127.0.0.1','root','') or die("Error al conectar " . mysql_error());
mysql_select_db('ventas_servicios') or die ("Error al seleccionar la Base de datos: " . mysql_error());
 
$result = mysql_query("SELECT * from usuario where bloqueo = 'N' and Email='" . $usuario . "'");
$no = mysql_query("SELECT Bloqueo from usuario where Email='" . $usuario . "'");

if($row = mysql_fetch_array($result)){
    if($row['password'] == $pass){
        if($row['TipoUsuario']==$tipo1){
            header("Location: inicio.php");  
            session_start();
            $_SESSION['Name'] = $row['Name'];
            $_SESSION['TipoUsuario'] = $row['TipoUsuario'];
            $_SESSION['idUsuario'] = $row['idUsuario'];
            $_SESSION['autentica'] = "SIP"; 
        }
        if($row['TipoUsuario']==$tipo2){
            header("Location: inicio.php");  
            session_start();
            $_SESSION['Name'] = $row['Name'];
            $_SESSION['TipoUsuario'] = $row['TipoUsuario'];
            $_SESSION['idUsuario'] = $row['idUsuario'];
            $_SESSION['autentica'] = "SIP"; 
        }
        if($row['TipoUsuario']==$tipo3){
            header("Location: inicio.php");  
            session_start();
            $_SESSION['Name'] = $row['Name'];
            $_SESSION['Email'] = $usuario;
            $_SESSION['idUsuario'] = $row['idUsuario'];
            $_SESSION['autentica'] = "SIP"; 
        }
        if($no = 'S'){
            echo '<script language="javascript">alert("Usuario Bloqueado");window.location="index.php";</script>';
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
?>