<?php
include "config.php";
session_start();
    $n=$_SESSION["user"];
    $fAct=$_REQUEST['fechaElim'];

$cons="SELECT * FROM realizaractividad WHERE email='$n' AND fechaActi='$fAct'";
$ejecu = mysqli_query($conexion, $cons);

if ($ejecu){
    while($resul = mysqli_fetch_array($ejecu)){
        $elim= "DELETE FROM realizaractividad WHERE fechaActi='$resul[fechaActi]' AND email='$resul[email]'";
        $ejecutar = mysqli_query($conexion, $elim);
    }
    echo '<script>
    window.location = "perfil.php";
    </script>';
}
?>