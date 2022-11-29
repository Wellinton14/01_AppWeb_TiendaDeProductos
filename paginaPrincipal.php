<?php
    //creacion de la sesion
    session_start();
    if(isset($_POST["txtNameUser"])&& isset($_POST["txtPasswordUser"])){
        $_SESSION["s_nombreUser"] = $_POST["txtNameUser"];
        $_SESSION["s_claveUser"] = $_POST["txtPasswordUser"];
    }
    //verificamos si se ha iniciado sesion
    if(!isset($_SESSION["s_nombreUser"]) && !isset($_SESSION["s_claveUser"])){
        header("Location: index.php");
    }

    //cookies
    //Creacion de nuevas variables
    $nombreUser=$_SESSION["s_nombreUser"];
    $claveUser=$_SESSION["s_claveUser"];
    
    //comprobamos si se ha seleccionado la opcion de recordar datos
    if(isset($_POST["chkpreferencias"])?$_POST["chkpreferencias"]:""){
        $guardarPreferencias=$_POST["chkpreferencias"];
    }else{
        $guardarPreferencias="";
    }

    //si se ha seleccionado la opcion de recordarme
    if($guardarPreferencias != ""){
        setcookie("c_nombre",$nombreUser, 0);
        setcookie("c_clave",$claveUser,0);
        setcookie("c_preferencias",$guardarPreferencias,0);
    }

    //variable que almacenara el texto
    $textototal="";

    //Lectura del texto
    //si el usuario elige Español
    if($_GET["idioma"]=="esp"){ 
        setcookie("c_idioma",$_GET["idioma"] , time()+(60*60*25)); //duracion de cookies mas de 24h
        $archivo = fopen('categorias_es.txt','r');
        while(!feof($archivo)){
            $textoline = fgets($archivo);
            $textototal = $textototal.nl2br($textoline);
        }
        fclose($archivo);
    }else{                                                         //si el usuario elige ingles
        setcookie("c_idioma",$_GET["idioma"] , time()+(60*60*25)); //duracion de cookies mas de 24h
        $archivo = fopen('categorias_en.txt','r');
        while(!feof($archivo)){
            $textoline = fgets($archivo);
            $textototal = $textototal.nl2br($textoline);
        }
        fclose($archivo);
    }
    
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Principal Tienda De Productos</title>
    </head>

    <body>
        <h1>Tienda de Productos</h1>
        <h2>Bienvenido: <?php echo $nombreUser ?></h1>
        <br>
        <hr>
        <!--Enlaces que cambian el idioma-->
        <a href="paginaPrincipal.php?idioma=esp">ES (Español) </a>
        |
        <a href="paginaPrincipal.php?idioma=ing">EN (English)</a>
        <br>
        <br>
        <hr>
        <!--Enlace que cierra sesion-->
        <a href="cerrarSesion.php">Cerrar Sesión</a>
        <br>
        <h2>Product List </h2>
        </br>
        <!--Impresion de texto segun el idioma-->
        <?php 
            echo$textototal
        ?>

    </body>
</html>