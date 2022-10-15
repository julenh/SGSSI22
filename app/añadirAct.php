<?php
include "config.php";
$idAct = $_POST['idAct'];
$desc = $_POST['desc'];
$numPlazas = $_POST['numPlazas'];
$f = $_POST['fecha'];
$l = $_POST['lugar'];

$comprobarId = "SELECT idAct from actividad where idAct = $idAct";
$resul = mysqli_query($conexion, $comprobarId);
$counte = mysqli_num_rows($resul);

//ingresar información a la base de datos
$insertar= "INSERT INTO actividad VALUES ('$idAct', '$desc', '$numPlazas', '$f', '$l')";
$actAp= "SELECT idAct from realizaractividad where idAct = $idAct";
$res = mysqli_query($conexion, $actAp);
//ejecutamos y verificamos si se guardan los datos

if ($counte<=0){
    mysqli_query($conexion, $insertar);
    echo '<script>
    alert("Nueva actividad añadida");
    window.location = "Actividades.php";
    </script>';
}
else{
    echo '<script>
    alert("No se pueden repetir los ID");
    window.location = "Actividades.php";
    </script>';
}
?>