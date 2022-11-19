<?php
include "config.php";

$email = $_REQUEST['correo'];
$contrasena = $_REQUEST['contrasena'];
$dni = $_REQUEST['dni'];
$nombre = $_REQUEST['nombres'];
$apellido = $_REQUEST['apellidos'];
$fechanac = $_REQUEST['fechanac'];
$numTelf = $_REQUEST['numtelf'];

//ingresar información a la base de datos
$sql="INSERT INTO usuario VALUES('$nombre','$apellido','$dni','$email','$contrasena','$fechanac','$numTelf')";
$cons="SELECT * FROM usuario WHERE dni='$dni' AND email='$email'";
$ejecut=mysqli_query($conexion,$cons);
$resul=mysqli_fetch_array($ejecut);
//ejecutamos y verificamos si se guardan los datos
if (!$resul){
    if (mysqli_query($conexion,$sql)){
        echo '<script>
        alert("Has creado la cuenta");
        window.location = "InicioSesion.html";
        </script>';
    }
}
else{
    echo '<script>
    alert("Ya existe la cuenta");
    window.location = "Registro.html";
    </script>';
}
?>