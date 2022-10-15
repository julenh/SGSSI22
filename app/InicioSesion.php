<?php
error_reporting(0);
session_start();
include "config.php";
include "reg.php";
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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="JavaScript/InicSesion.js"></script>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="estilos/e_InicioSesion.css">
  <title>Formulario Registro</title>
</head>
<body background="imagenes/InicSe.jpg">
    <nav id="Principal">
      <a class= "menu" href= "index.php">Página Principal  |</a>
      <a class= "menu" href= "Explorar.php">Explorar  |</a>
      <a class= "menu" href= "Actividades.php">Actividades  |</a>
      <a class= "menu" href= "Registro.php">Registro  |</a>
      <a class= "menu" href= "perfil.php">Mi Perfil</a>
    </nav>
    <?php
        if (!isset($n)){
            ?>
  <section class="form-register">
    <h4>Inicio Sesión</h4>
    <form name = "formularioIS" action="InicioSes.php" method="POST">
      <input class="controls" type="text" name="correo" id="correo" placeholder="Ingresa tu Correo">
      <input class="controls" type="password" name="contr" id="contr" placeholder="Ingresa tu Contraseña">
      <input class="botons" type="submit" value="Iniciar Sesión" onclick="iniciarSesion()" >
      <p><a href="Registro.php">¿Aún no tienes cuenta?</a></p>
  </form>
  </section>
  <?php
                }
                else{
            ?>
                <h1 id="tituloPrinc">DEBES <a id="inSes" href="cerrarSesion.php"> CERRAR SESIÓN </a> PARA INICIAR SESIÓN DE NUEVO</h1>
            <?php
                }
                ?>
</body>
</html>
