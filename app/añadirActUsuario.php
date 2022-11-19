<?php
error_reporting(0);
include "config.php";
session_start();
$n=$_SESSION["user"];

$idAct = $_GET['id'];
$f=$_POST['fecha'];

$actAp= "SELECT idAct from realizaractividad where email='$n' and idAct='$idAct'";
$res = mysqli_query($conexion, $actAp);
$count = mysqli_num_rows($res);

$con1 ="SELECT dni FROM usuario WHERE email='$n'";
$dni = mysqli_query($conexion, $con1);
$result = $dni->fetch_array()[0] ?? '';

$con2 = "SELECT email FROM usuario WHERE email='$n'";
$email = mysqli_query($conexion, $con2);
$resul = $email->fetch_array()[0] ?? '';

$con3="SELECT fecha FROM actividad WHERE idAct='$idAct'";
$fecha= mysqli_query($conexion, $con3);
$res= $fecha->fetch_array()[0] ?? '';

//ingresar información a la base de datos
$insertarCom = "INSERT INTO realizaractividad VALUES ('$result','$resul','$idAct','$res')";

//ejecutamos y verificamos si se guardan los datos
if ($count<=0){
    if(mysqli_query($conexion,$insertarCom)) {
        echo '<script>
        alert("Actividad reservada");
        window.location = "Actividades.php";
        </script>';
    }
    else{
        echo'<script>
        alert("Inicia sesión primero");
        window.location = "InicioSesion.html"
        </script>';
    }
}
else{
    echo '<script>
    alert("Actividad ya reservada anteriormente");
    window.location = "Actividades.php";
    </script>';
}



?>
