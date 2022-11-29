<?php
    //variables por defecto
    $preferencias = false;
    $nameUser="";
    $passwordUser="";
    $idioma="esp";

    //verificamos la existencia de cookies y asigamos a las variables
    if(isset($_COOKIE["c_preferencias"])&& $_COOKIE["c_preferencias"]!=""){
        $preferencias = true;
        $nameUser=(isset($_COOKIE["c_nombre"])?$_COOKIE["c_nombre"]:"");
        $passwordUser=(isset($_COOKIE["c_clave"])?$_COOKIE["c_clave"]:"");
        if($_COOKIE["c_idioma"]=="ing"){
            $idioma = "ing";            
        }
    }
    //En caso que desmarque recordar
    setcookie("c_preferencias","");
    
?>

<!DOCTYPE thml>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Tienda De Productos</title>
    </head>
    <body>
        <h1>Tienda de Productos</h1>
        <br/>
        <hr/>
        <h2>Login</h2>
        <br/>
        <form method="POST" action="paginaPrincipal.php?idioma=<?php echo $idioma?>">
            <fieldset>
                <label for="txtNameUser">Usuario : </label></br>
                <input type="text" name="txtNameUser" value="<?php echo $nameUser; ?>"/><br>
                </br>
                </br>
                <label for="txtpasswordUser">Contraseña :</label></br>
                <input type="password" name="txtPasswordUser" value="<?php echo $passwordUser; ?>"/><br>
                </br>
                </br>
                <input type="checkbox" name="chkpreferencias" <?php echo($preferencias)?"checked":"";?>> Recordar datos
                <br>
                <br>
                <input type="submit" value="Enviar">
            </fieldset>
        </form>

    </body>
</html>
