<?php
    include("validar/conexion_bbdd.php");
    
    $cedula=$_SESSION['cedula'];
    $descripcion=$_POST['objeto'];
    $trabajador=$_POST['trabajador'];
    $hoy=date("y-m-d");
    $Usuarios=$_SESSION['idUsuario'];
    
    $result = mysql_query("SELECT * FROM cliente WHERE CedulaC='$cedula'");
    $row=mysql_fetch_array($result);
    $idCliente=$row['idCliente'];
    
    $result = mysql_query("SELECT * FROM maquina WHERE DescripcionM='$descripcion'");
    $row=mysql_fetch_array($result);
    $idMaquina=$row['idMaquina'];
    
    $result = mysql_query("SELECT * FROM trabajador WHERE NombreT='$trabajador'");
    $row=mysql_fetch_array($result);
    $idTrabajador=$row['idTrabajador'];
    
    $sql=("INSERT INTO `ventas_servicios`.`factura` 
        (`idFactura`, `Cliente_idCliente`, `Maquina_idMaquina`, `Usuario_idUsuario`, `Fecha`, `Trabajador_idTrabajador`) 
        VALUES ('NULL', '$idCliente', '$idMaquina', '$Usuarios', '$hoy', '$idTrabajador');");
        $resulta = mysql_query($sql);
        
    if (! $resulta){
      echo "La consulta SQL contiene errores.".mysql_error();
      exit();
    }
        
    echo '<script language="javascript">window.location="registrofactura.php";</script>';
?>