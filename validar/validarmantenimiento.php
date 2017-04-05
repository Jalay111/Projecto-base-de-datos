<?php
include("conexion_bbdd.php");

$DescripcionMantenimiento=$_POST['descripcion'];
$Usuarios=$_SESSION['idUsuario'];
$trabajador=$_POST['trabajador'];
$maquina=$_POST['objeto'];
$hoy=date("y-m-d");

$result = mysql_query("SELECT * FROM maquina WHERE idMaquina='$maquina'");
$row=mysql_fetch_array($result);
$proximo=$row['TempoMantenimientoM'];
$nuevafecha=date('Y-m-d', strtotime("+'$proximo' month"));

$result = mysql_num_rows(mysql_query("SELECT * FROM detallemantenimiento WHERE DescripcionMantenimiento='$descripcion'"));
if($result==0){
 $sql=("INSERT INTO `ventas_servicios`.`detallemantenimiento` 
 (`idDetalleMantenimiento`, `DescripcionMantenimiento`, `Usuario_idUsuario`, `Trabajador_idTrabajador`, `Maquina_idMaquina`) 
 VALUES ('NULL', '$DescripcionMantenimiento', '$Usuarios','$trabajador','$maquina');");
 $resulta = mysql_query($sql);
 
 if (! $resulta){
   echo "La consulta SQL contiene errores.".mysql_error();
   exit();
 }
 
 echo '<script language="javascript">alert("El elemento se agrego correctamente");window.location="registrofactura.php";</script>';

 $sql = "SELECT * FROM maquina WHERE idMaquina='$maquina'"; 
 $result = mysql_query($sql);
 $sql = "UPDATE maquina SET FechaMantenimientoM='$hoy' FechaProxMantenimientoM='$nuevafecha' WHERE idMaquina='$maquina'";
 $result = mysql_query($sql);
 
 header("Location: ../mantenimiento.php");
 echo '<script language="javascript">alert("MantenimientoRegistrado");../mantenimiento.php";</script>';
 if (! $resultados){
   echo "La consulta SQL contiene errores.".mysql_error();
   exit();
 }
}else{
 echo '<script language="javascript">alert("Consulta ya registrada, no se puede registrar nuevamente");window.location="../mantenimiento.php";</script>'; 
}
?>
