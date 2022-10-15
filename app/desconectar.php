<?php
error_reporting(0);
session_start();

if($_SESSION['user']){

	session_destroy();
    echo("<script>
    alert('TIEMPO DE INACTIVIDAD SUPERADO, SE HA CERRADO LA SESIÓN');
    window.location='index.php';
    </script>");
}

else{
    echo("<script>
    window.location='index.php';
    </script>");
}

?>