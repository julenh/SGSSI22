<?php
error_reporting(0);
session_start();
include "config.php";
$n=$_SESSION["user"];
$nom=$_POST["nombres"];

$cons="UPDATE usuario SET nombre='$nom' WHERE email='$n'";
if(mysqli_query($conexion,$cons)){
    echo '<script>
    alert("Nombre Cambiado");
    window.location = "perfil.php";
    </script>';
}

?>