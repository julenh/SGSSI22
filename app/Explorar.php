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
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>EXPLORAR</title>
        <link rel="stylesheet" href="estilos/e_Explorar.css">
    </head>
    <body background="imagenes/uni.jpg">
        <nav id="Principal">
            <a class= "menu" href= "index.php">Página Principal  |</a>
            <a class= "menu" href= "Explorar.php">Explorar  |</a>
            <a class= "menu" href= "Actividades.php">Actividades  |</a>
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
        <section id="cuerpo">
            <h2>
                ¡Explora las universidades que hay cerca de ti y ponte en contacto con ellos vía e-mail!
            </h2>
            <section class="botones">
                <input class="botons" type="button" value="Universidades Cerca" onclick= "location.href = 'Universidades.php'"/>
            </section>
            
        </section>
    </body>
</html>
