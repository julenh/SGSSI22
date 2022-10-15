<?php
error_reporting(0);
session_start();
include "config.php";
$n=$_SESSION["user"];

header( 'X-Content-Type-Options: nosniff' );
header("X-Frame-Options: DENY");
?>

<script>
<?php
if (isset($n)){
?>
window.onload = function(){killerSession();}
 
function killerSession(){
   var tiempo;
   window.onload=comenzar;
   document.onmousemove=comenzar;
   document.onkeydown=comenzar;
   function comenzar(){
       clearTimeout(tiempo)
       tiempo=setTimeout("window.open('desconectar.php','_top');",60000); 
   }
<?php
   }
?>
}
</script>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Meet Erasmus+</title>
        <link rel="stylesheet" href="estilos/estilosPrinc.css"/>
    </head>
    <body background="imagenes/princ.jpg">
        <nav id="Principal">
            <a class= "link" href= "index.php">Página Principal  |</a>
            <a class= "link" href= "Explorar.php">Explorar  |</a>
            <a class= "link" href= "Actividades.php">Actividades  |</a>
            <a class= "menu" href= "Registro.php">Registro  |</a>
            <a class= "menu" href= "perfil.php">Mi Perfil</a>
            <?php     
                if (isset($n)){
                ?>
                <div class="mi">
                    <a href= "cerrarSesion.php">CERRAR SESION</a>
                </div>
                <?php
                    }
                else{
                ?>
                <div class="mi">
                    <a href= "InicioSesion.php">INICIAR SESION</a>
                </div>
                <?php
                    }
                ?>
        </nav>
    <section>
        <h1 id=cuerpo>BIENVENID@ A ERASMUS+ </h1>
        <br>
        <h2 id=cuerpo2> TU WEB PARA FACILITARTE LA BÚSQUEDA DE UNIVERSIDADES CERCA DE TI, <br>
            TE ENCONTRAMOS LAS ACTIVIDADES REALIZADAS POR USUARIOS <br>
            PARA CONOCER MEJOR TU LUGAR DE ERASMUS</h2>
        <br>
        <h3 id=cuerpo2> APÚNTATE Y AÑADE MÁS ACTIVIDADES SI TE GUSTA ESTA EXPERIENCIA! </h3>
    </section>
    </body>
</html>
