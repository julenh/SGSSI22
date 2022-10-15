<?php
error_reporting(0);
session_start();
include "config.php";
$n=$_SESSION["user"];
$telf=$_POST["numtelf"];

$cons4="UPDATE usuario SET telef='$telf' WHERE email='$n'";
    if(mysqli_query($conexion,$cons4)){
        echo '<script>
        alert("Telefono cambiado");
        window.location = "perfil.php";
        </script>';
    }
?>