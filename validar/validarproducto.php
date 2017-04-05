
<?php
session_start();

if(isset($_POST['nombre'])&& !empty($_POST['descripcion'])&&!empty($_POST['precio'])&&!empty($_POST['cantidad'])){
  $idProductoServicio=NULL;
  $nombre= $_POST['nombre'];
  $descripcion= $_POST['descripcion'];
  $tipo= 1;
  $cantidad=$_POST['cantidad'];
  $precio= $_POST['precio'];
  $Usuarios=$_SESSION['idUsuario'];
  mysql_connect('127.0.0.1','root','') or die("Error al conectar " . mysql_error());
  mysql_select_db('ventas_servicios') or die ("Error al seleccionar la Base de datos: " . mysql_error());
  $result = mysql_num_rows(mysql_query("SELECT * FROM productoservicio WHERE NombrePS='$nombre'"));
   if($result==0){
    $sql=("INSERT INTO `ventas_servicios`.`productoservicio` (`idProductoServicio`, `NombrePS`, `DescripcionPS`, `PrecioPS`, `CantidadPS`,`TipoPS`, `Usuario_idUsuario`) 
    VALUES ('NULL', '$nombre ', '$descripcion', '$precio', '$cantidad', '$tipo','$Usuarios');"); 
    $resultados = mysql_query($sql);
   header("Location: ../productos.php");
    echo '<script language="javascript">alert("El servicio se registro");window.location="../producto.php";</script>'; 
  
    if (! $resultados){
      echo "La consulta SQL contiene errores.".mysql_error();
      exit();
    }
  }else{
   echo '<script language="javascript">alert("Consulta ya registrada, no se puede registrar nuevamente");window.location="../producto.php";</script>'; 
  }
}else{
 echo '<script language="javascript">alert("se deben llenar todos los datos");window.location="../producto.php";</script>';
}
?>
