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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="estilos/e_registro.css">
  <script type="text/javascript" src="JavaScript/Registro.js"></script>
  <title>Formulario Registro</title>
</head>
<body background="imagenes/InicSe.jpg">
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

    <section class="form-register">
    <?php
        if (!isset($n)){
    ?>
      <h4>¡Unete a nosotros!</h4>  
      <form name = "formulario" action ="reg.php" method="POST">
        <input class="controls" type="text" name="nombres" id="nombres" placeholder="Introduce tu Nombre">
        <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Introduce tu Apellido" >
        <input class="controls" type="dni" name= "dni" id= "dni" placeholder="Introduce tu DNI, Ej. 11111111-Z" title="El formato debe ser 11111111-Z" /> 
        <input class="controls" type="date" name="fechanac" id="fechanac" placeholder="Introduce tu fecha de nacimiento, dd-mm-aaaa">
        <input class="controls" type="tel" name="numtelf" id="numtelf" placeholder="Introduce tu Número de teléfono">
        <input class="controls" type="text" name="cuentaBanc" id="cuentaBanc" placeholder="Introduce tu cuenta bancaria" >
        <input class="controls" type="text" name="correo" id="correo" placeholder="Introduce tu Correo" >
        <input class="controls" type="password" name="contrasena" id="contraseña" placeholder="Introduce tu Contraseña">
        <input class="botons" id="botonReg" type="submit" value="¡Registrame!" onclick="anadir()">
        <p><a href="InicioSesion.php">¡Ya tengo Cuenta!</a></p>
      </form>
      <?php
        }
        else{
        ?>
            <h1 id="tituloPrinc">DEBES <a id="inSes" href="cerrarSesion.php"> CERRAR SESIÓN </a> PARA REGISTRAR UNA CUENTA NUEVA</h1>
        <?php
        }
        ?>
    </section>
</body>
</html>
