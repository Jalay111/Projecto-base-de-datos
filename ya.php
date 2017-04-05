<?php require_once("validar/sesionactiva.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Clientes</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <script language="javascript">
      function mostrar(){
        document.getElementById('ventana').style.visibility='visible';
      }
      function cerrar(){
        document.getElementById('ventana').style.visibility='hidden';
      }
    </script>
</head>

<form>
    <div class="row">
        <div class="col-xs-4">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" class="form-control" placeholder="Username">
            </div>
        </div>
        <div class="col-xs-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cantidad">
                <span class="input-group-addon">.00</span>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="text" class="form-control"  value="<?php echo $row["campox"]; ?>"placeholder="$">
                <span class="input-group-addon">.00</span>
            </div>
        </div>
    </div>
</form>
</html>