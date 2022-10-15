<?php
require 'config.php';
$id = $_POST['id'];
$descrip = $_POST['descrip'];
$numPlazas = $_POST['numPlazas'];
$fecha = $_POST['fecha'];
$lugar = $_POST['lugar'];

$update = "UPDATE actividad set idAct='$id', descrip='$descrip', numPlazas='$numPlazas', fecha='$fecha', lugar='$lugar' WHERE idAct = '$id'";
$rta = mysqli_query($conexion, $update);
header("Location: Actividades.php");
?>