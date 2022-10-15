<?php
error_reporting(0);
session_start();
include "config.php";
include "reg.php";
$n=$_SESSION["user"];
$cuentaBanc=$_POST["cuentaBanc"];

$cuentaBancCifr = cifrar($cuentaBanc, $llave);
$cons6="UPDATE usuario SET cuentaBanc='$cuentaBancCifr' WHERE email='$n'";
    if(mysqli_query($conexion,$cons6)){
        echo '<script>
        alert("Cuenta cambiada");
        window.location = "perfil.php";
        </script>';
    }
?>