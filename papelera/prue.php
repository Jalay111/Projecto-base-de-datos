<!DOCTYPE HTML>
<html>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido</title>
 
 <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="valida/css/login.css" media="screen" />
      
</head>
  <body>
    <form method="POST" action="return false" onsubmit="return false"> <!--onsubmit="return false"-->
      <HR>
      <h1>Login</h1>
      <input type="text" name="nnombre" id="nnombre" value="" max-length="20" placeholder="ingresar usuario"/>
      <input type="password" name="npassword" id="npassword" value="" max-length="20" placeholder="ingresar contraseña"/>
      <button onclick="Validar(document.getElementById('nnombre').value, document.getElementById('npassword').value);">Iniciar Sesion </button>
    </form>
    <IMG SRC="valida/imagenes/logo_centrado.png">
      </body>
        <script>
 function Validar(nnombre, npassword)
        {
            $.ajax({
                url:"vali.php",
                type: "POST",
                data: "nnombre="+nnombre+"&npassword="+npassword,
                success: function(resp){
                $('#resultado').html(resp)
                }       
            });
        }
        </script>
    </div>
</div>
</html>
