<?php
session_start();
if(!empty($_POST['nombre'])&&!empty($_POST['apellido'])&&!empty($_POST['direccion'])&& !empty($_POST['telefono'])&& !empty($_POST['cedula'])&& !empty($_POST['correo'])){
  $idcliente=NULL;
  $nombre= $_POST['nombre'];
  $apellido= $_POST['apellido'];
  $direccion= $_POST['direccion'];
  $telefono= $_POST['telefono'];
  $cedula= $_POST['cedula'];
  $correo= $_POST['correo'];
  $Usuarios=$_SESSION['idUsuario'];
  mysql_connect('127.0.0.1','root','') or die("Error al conectar " . mysql_error());
  mysql_select_db('ventas_servicios') or die ("Error al seleccionar la Base de datos: " . mysql_error());
  $result = mysql_num_rows(mysql_query("SELECT * FROM cliente WHERE cedulaC='$cedula'"));
   if($result==0){
    $sql=("INSERT INTO `ventas_servicios`.`cliente` (`idCliente`, `NombreC`, `ApellidoC`, `DireccionC`, `TelefonoC`, `CedulaC`, `CorreoC`, `Usuario_idUsuario`) 
    VALUES ('NULL', '$nombre ', '$apellido', '$direccion', '$telefono', '$cedula', '$correo', '$Usuarios');");    
    echo '<script language="javascript">alert("Usuario Registrado");window.location="clientes.php";</script>'; 
    $resultados = mysql_query($sql);
    if (! $resultados){
      echo "La consulta SQL contiene errores.".mysql_error();
      exit();
    }else{
     header('Location: ../clientes.php');
    }
  }else{
   echo '<script language="javascript">alert("Usuario ya registrado, no se puede registrar nuevamente");window.location="../clientes.php";</script>'; 
  }
}else{
 echo '<script language="javascript">alert("se deben llenar todos los datos");window.location="../clientes.php";</script>';
}
?>