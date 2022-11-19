<?php
include "config.php";

$idAct = $_GET['id'];

//ingresar información a la base de datos
$elim= "DELETE FROM actividad WHERE idAct=$idAct";
$ejecutar = mysqli_query($conexion, $elim);

//ejecutamos y verificamos si se eliminan los datos
if ($ejecutar) {
    echo '<script>
    alert("Actividad eliminada");
    window.location = "Actividades.php";
    </script>';
}
else{
    echo '<script>
    alert("No se puede eliminar actividad");
    </script>';
}

?>