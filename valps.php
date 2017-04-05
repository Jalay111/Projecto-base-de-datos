<?php
            session_start(); 
            include("validar/cox.php");  
            $codps=$_GET ['term'];
             $conexion = new mysqli('localhost','root','','ventas_servicios');
            //$con=mysql_connect($host,$user,$pw)or die ("problema al conectar");	
            //mysql_select_db($db,$con) or die ("problema al conectar la base de datos");
            $result ="SELECT * FROM productoservicio WHERE idProductoServicio like '%$codps%'"; 
            
           $re = $conexion->query($result);

if($re->num_rows > 0){
	while($row = $re->fetch_array()){
		$codps[] = $row['idProductoServicio'];		
}
	echo json_encode($codps);
}

?>