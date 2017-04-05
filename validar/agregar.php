<?php
    include("conexion_bbdd.php");
    $id=$_GET['id'];
    $idFactura=$_GET['idFactura'];
    $Usuarios=$_SESSION['idUsuario'];
    $cantidad=1;
    
    $result = mysql_num_rows(mysql_query("SELECT * FROM detallefactura WHERE ProductoServicio_idProductoServicio='$id' and Factura_idFactura='$idFactura'"));
    
    if($result == 0){
        
        $result = mysql_query("SELECT * FROM productoservicio WHERE idProductoServicio='$id'");
        $row=mysql_fetch_array($result);
        $ValorUnitario=$row['PrecioPS'];
        $tipo=$row['TipoPS'];
        $cantidadactual=$row['CantidadPS'];
        
        //echo " idfactura:".$idFactura." idProductoServicio:".$id." DescripcionPS:".$Descripcion." Valor del Producto o servicio:".$ValorUnitario." id del usuario:".$Usuarios;
        
        $sql=("INSERT INTO `ventas_servicios`.`detallefactura` 
        (`Factura_idFactura`, `ProductoServicio_idProductoServicio`, `ValorUnitario`, `Cantidad`, `Usuario_idUsuario`) 
        VALUES ('$idFactura', '$id', '$ValorUnitario', '$cantidad','$Usuarios');");
        $resulta = mysql_query($sql);
        
        if($tipo==1){
            $sql = "SELECT * FROM productoservicio WHERE idProductoServicio='$id'"; 
            $result = mysql_query($sql);
            $nuevo=$cantidadactual-$cantidad;
            $sql = "UPDATE productoservicio SET CantidadPS='$nuevo' WHERE idProductoServicio='$id'";
            $result = mysql_query($sql);
        }
        
        if (! $resulta){
          echo "La consulta SQL contiene errores.".mysql_error();
          exit();
        }
        
        echo '<script language="javascript">alert("El elemento se agrego correctamente");window.location="../registrofactura.php";</script>';
        
    }else{
        echo '<script language="javascript">alert("Elemento ya agregado");window.location="../registrofactura.php";</script>';
    }
?>