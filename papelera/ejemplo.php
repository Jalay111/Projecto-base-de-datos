

<!DOCTYPE html>
<html>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<div class="contenedor">
    <div id="formulario"    >
        <form method="POST" action="return false" onsubmit="return false">
            <div id="resultado"></div>
            <img src="img/login.png" alt="" width="40" height="40">
            <p><input type="text" name="nnombre" id="nnombre" value="" placeholder="Usuario"></p>
            <p><input type="password" name="npassword" id="npassword" value="" placeholder="Password"></p>
            <p><button onclick="Validar(document.getElementById('nnombre').value, document.getElementById('npassword').value);">Accesar</button></p>
        </form>
        <script>
 
        function Validar(nnombre, npassword)
        {
            $.ajax({
                url: "vali.php",
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


