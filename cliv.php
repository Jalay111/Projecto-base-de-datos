<?php
            session_start(); 
            include("validar/cox.php");  
            $cedula=$_GET ['term'];
             $conexion = new mysqli('localhost','root','','ventas_servicios');
            //$con=mysql_connect($host,$user,$pw)or die ("problema al conectar");	
            //mysql_select_db($db,$con) or die ("problema al conectar la base de datos");
            $result ="SELECT * FROM cliente WHERE CedulaC like '%$cedula%'"; 
            
           $re = $conexion->query($result);

if($re->num_rows > 0){
	while($row = $re->fetch_array()){
		$cedula[] = $row['CedulaC'];		
}
	echo json_encode($cedula);
}

?>
