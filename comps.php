<?php
            session_start(); 
            include("validar/cox.php");  
            $codps=$_POST ['codps'];
            $conexion = new mysqli('localhost','root','','ventas_servicios');
            //$con=mysql_connect($host,$user,$pw)or die ("problema al conectar");	
            //mysql_select_db($db,$con) or die ("problema al conectar la base de datos");
            $result ="SELECT * FROM productoservicio WHERE idProductoServicio='$codps'"; 
            $re = $conexion->query($result);
            $respuesta = new stdClass();
             
            if($re->num_rows > 0){
                $row = $re->fetch_array();
               
             $respuesta->nombreps = $row['NombrePS'];
             $respuesta->preciops = $row['PrecioPS'];
            
             }
             echo json_encode($respuesta);
?>