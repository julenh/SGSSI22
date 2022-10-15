<?php
error_reporting(0);
session_start();
include "config.php";
$n=$_SESSION["user"];
$fechaNa=$_POST["fechanac"];

$cons3="UPDATE usuario SET fechanac='$fechaNa' WHERE email='$n'";
if(mysqli_query($conexion,$cons3)){
    echo '<script>
    alert("Fecha de nacimiento cambiada");
    window.location = "perfil.php";
    </script>';
}
?>