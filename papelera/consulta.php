<?php
include("cox.php");
$doc=$_POST ['nombre'];
$con=mysql_connect($host,$user,$pw)or die ("problema al conectar");	
mysql_select_db($db,$con) or die ("problema al conectar la base de datos");
$registro=mysql_num_rows(mysql_query("SELECT * FROM ventas_servicios.Usuario WHERE Name='$doc'"));


if($registro==0){
    echo "$doc NO aparece en la base de datos, DEBE registrarse, para ser un Joven en Accion";
}
else{
    echo "$doc SI aparece en la base de datos, NO debe registrarse, ya eres un Joven en Accion";
}
?>
