<?php
error_reporting(0);
session_start();
include "config.php";
$n=$_SESSION["user"];
$ape=$_POST["apellidos"];

$cons1="UPDATE usuario SET apellido='$ape' WHERE email='$n'";
if(mysqli_query($conexion,$cons1)){
    echo '<script>
    alert("Apellido Cambiado");
    window.location = "perfil.php";
    </script>';
}
?>