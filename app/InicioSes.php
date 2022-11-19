<?php
    error_reporting(0);
    include "config.php";
    session_start();
    
    $emailU = $_REQUEST['correo'];
    $contraU = $_REQUEST['contr'];

    $consulta="SELECT COUNT(*) as CONTADOR FROM usuario WHERE email='$emailU' and contrasena='$contraU'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);
    
    if ($filas['CONTADOR'] > 0){
        
        $_SESSION["user"]=$emailU;
        echo '<script>
        alert("SESIÓN INICIADA");
        window.location = "perfil.php";
        </script>';
        

    }else{
    
        echo '<script>
        alert("DATOS INCORRECTOS");
        window.location = "InicioSesion.html";
        </script>';

    }  
?>