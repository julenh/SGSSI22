<?php
error_reporting(0);
session_start();
include "config.php";
include "reg.php";
$n=$_SESSION["user"];
$contr=$_POST["contraseña"];

$contrCifrada = password_hash($contr, PASSWORD_DEFAULT);
$cons5="UPDATE usuario SET contrasena='$contrCifrada' WHERE email='$n'";
    if(mysqli_query($conexion,$cons5)){
        echo '<script>
        alert("Contraseña cambiada");
        window.location = "perfil.php";
        </script>';
    }
?>