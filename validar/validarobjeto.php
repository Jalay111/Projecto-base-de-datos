<?php
session_start();
if(!empty($_POST['descripcion'])&&!empty($_POST['tiempo'])&&!empty($_POST['cliente'])){
  $idcliente=NULL;
  $descripcion= $_POST['descripcion'];
  $tiempo= $_POST['tiempo'];
  $cedula_cliente= $_POST['cliente'];
  $Usuarios=$_SESSION['idUsuario'];
  mysql_connect('127.0.0.1','root','') or die("Error al conectar " . mysql_error());
  mysql_select_db('ventas_servicios') or die ("Error al seleccionar la Base de datos: " . mysql_error());
  $result = mysql_num_rows(mysql_query("SELECT * FROM maquina WHERE DescripcionM='$descripcion'"));
  //$idCliente = mysql_query("SELECT idCliente FROM cliente WHERE CedulaC='$cedula_cliente'");
  $idCli = mysql_query("SELECT * FROM cliente WHERE CedulaC='" . $cedula_cliente . "'");
  $row = mysql_fetch_array($idCli);
  $idCliente=$row['idCliente'];
  
  
  //$idCliente = mysql_query("SELECT * FROM productoservicio WHERE TipoPS='2'and NombrePS like '%$busqueda%' or idProductoServicio like '%$busqueda%' or DescripcionPS like '%$busqueda%' or PrecioPS like '%$busqueda%'");
  
   if($idCliente==NULL){
    echo '<script language="javascript">alert("este cliente no esta registrado");window.location="../objetos.php";</script>'; 
   }
   
   if($result==0){
    $sql=("INSERT INTO `ventas_servicios`.`maquina` (`idMaquina`, `descripcionM`, `TempoMantenimientoM`, `Usuario_idUsuario`, `Cliente_idCliente`) 
    VALUES ('NULL', '$descripcion ', '$tiempo', '$Usuarios','$idCliente');");    
    echo '<script language="javascript">alert("Objeto Registrado");window.location="../objetos.php";</script>'; 
    $resultados = mysql_query($sql);
    if (! $resultados){
      echo "La consulta SQL contiene errores.".mysql_error();
      exit();
    }else{
     header('Location: ../objetos.php');
    }
  }else{
   echo '<script language="javascript">alert("Objeto ya registrado, no se puede registrar nuevamente");window.location="../objetos.php";</script>'; 
  }
}else{
 echo '<script language="javascript">alert("se deben llenar todos los datos");window.location="../objetos.php";</script>';
}
?>