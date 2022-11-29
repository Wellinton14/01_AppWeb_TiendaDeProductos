<?php
    //inicio de sesion
    session_start();
    //terminamos la sesion
    session_destroy();
    //redireccionamos
    header("Location:index.php");

    //eliminamos las cookies
    if($_COOKIE["c_preferencias"]==""){
        setcookie("c_nombre","");
        setcookie("c_clave","");
        setcookie("c_preferencias","");
        setcookie("c_idioma","");
    }


?>
