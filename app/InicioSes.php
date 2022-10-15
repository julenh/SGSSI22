<?php
    error_reporting(0);
    include "config.php";
    session_start();
    
    header( 'X-Content-Type-Options: nosniff' );
    header("X-Frame-Options: DENY");
    
    $emailU = mysqli_real_escape_string($conexion, $_POST['correo']);
    $contraU = mysqli_real_escape_string($conexion,$_POST['contr']);
    


    $consul =  "SELECT * FROM usuario WHERE email='$emailU'"; //contraseña cifrada 
    $res = $conexion -> query($consul);


    if ($res->num_rows>0){
        $array_data = $res -> fetch_array();
        $dni=$array_data['dni'];

        if (password_verify($contraU, $array_data['contrasena'])){
            $co="INSERT INTO intentos_usuarios VALUES('$emailU','$dni','Exitosa',NOW())";
            $rp=mysqli_query($conexion,$co);
            
            $_SESSION["user"]=$emailU;
            echo '<script>
            alert("SESIÓN INICIADA, SE HA REGISTRADO EN LA BD");
            window.location = "perfil.php";
            </script>';
            

        }else{
            $c1="INSERT INTO intentos_usuarios VALUES('$emailU','$dni','Fallida',NOW())";
            $rp1=mysqli_query($conexion,$c1);
            echo '<script>
            alert("CONTRASEÑA INCORRECTA, SE HA REGISTRADO EN LA BD");
            window.location = "InicioSesion.php";
            </script>';
        }  
    }
    else{
        $c="INSERT INTO intentos_usuarios VALUES('$emailU','----------','Fallida',NOW())";
        $r=mysqli_query($conexion,$c);
        echo '<script>
            alert("DATOS DE INICIO DE SESIÓN ERRÓNEOS, SE HA GUARDADO EL INTENTO EN LA BD");
            window.location = "InicioSesion.php";
            </script>';
    }
?>
