
<?php

// Con este se imprimen los valores del arreglo como validacion solo
 
//en este caso asigno los elementos del arreglo que se llama tienda a la variable lista
 
 $lista=implode(',',$_POST['']);
 $lista2=implode(',',$_POST['tienda']);
 echo $lista;
 
//esta linea cuenta cuantos elementos tiene nuestro arreglo
 $count = count($tienda);
 
 // Aqui va a insertar un insert por cada uno de los elementos contados anteriormente
 for($j = 0; $j < $count; $j++)
 {
 
//traigo los elementos de la lista y se los asigno a la variable idtienda
 $idtienda = $_POST['tienda'][$j];
 
//este es solo para que imprima el que trae
 echo $idtienda."
";
 
 //consulta mysql que insertara una vez por cada elemento
 $query1 = mysql_query( "INSERT factura (idFactura , cliente_idCliente,Usuario_idUusuario,Fecha,Trabajado_idTrabajador) VALUES ('$idpromocion' , '$idtienda')" );
 
 }
 
 ?>