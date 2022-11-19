<?php
error_reporting(0);
session_start();
include "config.php";
$n=$_SESSION["user"];
$nom=$_REQUEST["nombres"];
$ape=$_REQUEST["apellidos"];
$contr=$_REQUEST["contraseña"];
$fechaNa=$_REQUEST["fechanac"];
$telf=$_REQUEST["numtelf"];
$bN=$_REQUEST["btN"];
$bA=$_REQUEST["btA"];
$btD=$_REQUEST["btD"];
$bF=$_REQUEST["btF"];
$bT=$_REQUEST["btT"];
$bC=$_REQUEST["btC"];
?>
<?php
if(isset($bN)){
    $cons="UPDATE usuario SET nombre='$nom' WHERE email='$n'";
    if(mysqli_query($conexion,$cons)){
        echo '<script>
        alert("Nombre Cambiado");
        window.location = "perfil.php";
        </script>';
    }
}
elseif(isset($bA)){
    $cons1="UPDATE usuario SET apellido='$ape' WHERE email='$n'";
    if(mysqli_query($conexion,$cons1)){
        echo '<script>
        alert("Apellido Cambiado");
        window.location = "perfil.php";
        </script>';
    }
}
elseif (isset($bF)){
    $cons3="UPDATE usuario SET fechanac='$fechaNa' WHERE email='$n'";
    if(mysqli_query($conexion,$cons3)){
        echo '<script>
        alert("Fecha de nacimiento cambiada");
        window.location = "perfil.php";
        </script>';
    }

}
elseif (isset($bT)){
    $cons4="UPDATE usuario SET telef='$telf' WHERE email='$n'";
    if(mysqli_query($conexion,$cons4)){
        echo '<script>
        alert("Telefono cambiado");
        window.location = "perfil.php";
        </script>';
    }

}

elseif (isset($bC)){
    $cons5="UPDATE usuario SET contrasena='$contr' WHERE email='$n'";
    if(mysqli_query($conexion,$cons5)){
        echo '<script>
        alert("Contraseña cambiada");
        window.location = "perfil.php";
        </script>';
    }
}
else{
    echo "NO TIRA";
}
?>
