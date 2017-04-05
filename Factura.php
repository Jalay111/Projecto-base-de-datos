<?php 
  session_start(); 
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">



    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="styles/css/menu.css"/>
    <link rel="stylesheet" href="styles/css/style.css"/>
   
    <link rel="stylesheet" href="styles/css/scrollbar.css"/>
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
   		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
 -->

</head>




<body>
  <header>
  <nav>
    <ul>
      <li><a href="inicio.php"><span class=""><i class="icon icon-home"></i></span>Inicio</a></li>
      <li><a href="servicios.php"><span class=""><i class="icon icon-flash"></i></span>Servicios</a></li>
      <li><a href="productos.php"><span class=""><i class="icon icon-price-tag"></i></span>Productos</a></li>
      <li><a href="facturacion.php"><span class=""><i class="icon icon-documents"></i></span>Facturacion</a></li>
      <li><a href="clientes.php"><span class=""><i class="icon icon-users"></i></span>Clientes</a></li>
      <li><a href="objetos.php"><span class=""><i class="icon icon-briefcase"></i></span>Objetos</a></li>
      <li><a href="mantenimiento.php"><span class=""><i class="icon icon-tools"></i></span>Mantenimiento</a></li>
      <li><a href="orden_compra.php"><span class=""><i class="icon icon-tag"></i></span>Orden de Compra</a></li>
    </ul>
  </nav>
  <div class="cerrar">
      <a href="validar/logout.php"><i class="icon icon-log-out"></i></a>
  </div>
  <script>
	       	$(document).ready(function(){ 	
				$( "#cedula" ).autocomplete({
      				source: "cliv.php",
      				minLength: 2
    			});
    			
    			$("#cedula").focusout(function(){
    				$.ajax({
    					url:'valice.php',
    					type:'POST',
    					dataType:'json',
    					data:{ cedula:$('#cedula').val()}
    				}).done(function(respuesta){
    					$("#nombre").val(respuesta.nombre);
    					$("#apellido").val(respuesta.apellido);
    				});
    			});    			    		
			});
        </script>
         <script>
	       	$(document).ready(function(){ 	
				$( "#codps" ).autocomplete({
      				source: "valps.php",
      				minLength: 1
    			});
    			
    			$("#codps").focusout(function(){
    				$.ajax({
    					url:'comps.php',
    					type:'POST',
    					dataType:'json',
    					data:{ codps:$('#codps').val()}
    				}).done(function(respuesta){
    					$("#nombreps").val(respuesta.nombreps);
    					$("#preciops").val(respuesta.preciops);
    				});
    			});    			    		
			});
        </script>
  </header>

   
            
<!-- /.n
            <!-- /.navbar-static-side -->
        
<center>
        <div id="page-wrapper">
            <div class="row">
             
  <div class="container">
 
                <div class="col-lg-12">
                   <br><br> <h1 class="page-header"><i class="fa fa-truck fa-fw"></i>Facturacion</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
               
                 <div class="panel-body">
                  
                                <table width="40%">
                                    <tbody>

                                        <tr>
                                           
                                            <th>Empleado<input type="text" name="empleado" value="<?php echo $_SESSION['Name']; ?>"class="form-control"></th>
                                           <th>Codigo Cliente<input type="text" name="cedula" id="cedula"class="form-control"></th>
                                             <th> <button type="button" class="btn btn-info"action="validar/validarcliente.php">Buscar </button><th></tr>
                                             <br> <th>Cliente<input type="text" name="nombre" id="nombre" class="form-control" values=""> </th>
                                             <th>Apellido<input type="text" name="apellido" id="apellido" class="form-control"values""></th>
                                             <th>Fecha<input type="text" id="date_range" name="date_range" class="form-control"></th></tr>
                                   <th> Codigo <input type="text" name="codps" id="codps"class="form-control"></th>
                                
                               <th> <button class="btn btn-info" type="button" >
                                    <i class="fa fa-search">Buscar</i>
                                </button>
                                </th><br><th>Producto o Servicio<input type="text" name="nombrepd" id="nombreps" values=""class="form-control" >
                            
                          
                                          
                                                  <!-- /input-group -->
                      </tr>
                                    <tr>   
                                       <th>Cantidad<input type="text" class="form-control" >
                            
                                             <th>Precio<input type="text" name=preciops id="preciops" value=""class="form-control"></th></tr>
                                             
                                       
                                    
                                           
                                           
                                        </tr>
                                       
                                    </tbody>
                                </table>
                           
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    


                    <!-- /.panel -->
                <br><br>
                  <button type="button" class="btn btn-info"><i class=" fa fa-save fa-fw" ></i> Adicionar </button>
                  <button type="button" class="btn btn-info" ><i class=" fa fa-save fa-fw" ></i> Facturar </button>
                  
                    <!-- Ventana-->
                           
            
			
			
		
    
      

 
                                    </tbody>
                                </table>
                                </center>
                                
                                <div class="container">
    <div class="row">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Id Producto</th>
            <th>Tipo</th>
            <th>Cantidad</th>
            <th>Precio</th>
          </tr>
        </thead>
        <tbody>
          <?php
            
              echo '<tr>';
              echo '<td>'. $row['idFactura'] . '</td>';
              echo '<td>'. $row['Fecha'] . '</td>';
              echo '<td>'. $row['NombreC'] . '</td>';
              echo '<td>'. $row['CedulaC'] . '</td>';
              echo '<td><a href="logout.php"><i class="icon icon-list">ver Factura</i></a></td>';
              echo '</tr>';
          ?>
        </tbody>
      </table>
    </div>
  </div> <!-- /container -->
                   

          

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    

</body>

</html>