<?php
include "config.php";

$email = mysqli_real_escape_string($conexion, $_POST['correo']);
$contrasena = $_POST['contrasena'];
$dni = mysqli_real_escape_string($conexion, $_POST['dni']);
$nombre = $_POST['nombres'];
$apellido = $_POST['apellidos'];
$fechanac = $_POST['fechanac'];
$numTelf = $_POST['numtelf'];
$cuentaBanc = $_POST['cuentaBanc'];
$contrCifrada = password_hash($contrasena, PASSWORD_DEFAULT); 

//cifrado simetrico conseguido de: https://www.youtube.com/watch?v=D-d10rXX4nE
$llave = "\lallaveseraestafrase2021.!";

function cifrar($cuentaBanc, $llave){
    $inicvec = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
    $ctabancariaencrip = openssl_encrypt($cuentaBanc, "AES-256-CBC", $llave, 0, $inicvec);
    return base64_encode($ctabancariaencrip. "::" .$inicvec);
}
function descifrar($cuentaBanc, $llave){
    list($datos_encriptados, $inicvec) = explode('::', base64_decode($cuentaBanc), 2);
    return openssl_decrypt($datos_encriptados, 'AES-256-CBC', $llave, 0, $inicvec);
    
} 

$cuentaBancaria = cifrar($cuentaBanc, $llave);

//ingresar información a la base de datos
$sql="INSERT INTO usuario VALUES('$nombre','$apellido','$dni','$email','$contrCifrada','$cuentaBancaria','$fechanac','$numTelf')";
$cons="SELECT * FROM usuario WHERE dni='$dni' AND email='$email'";
$ejecut=mysqli_query($conexion,$cons);
$resul=mysqli_fetch_array($ejecut);
//ejecutamos y verificamos si se guardan los datos
if (!$resul){
    if (mysqli_query($conexion,$sql)){
        echo '<script>
        alert("Has creado la cuenta");
        window.location = "InicioSesion.php";
        </script>';
    }
}
else{
    echo '<script>
    alert("Ya existe la cuenta");
    window.location = "Registro.php";
    </script>';
}
?>
