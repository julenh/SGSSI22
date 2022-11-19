<?php
error_reporting(0);
session_start();
include "config.php";
$n=$_SESSION["user"];
$bN=$_REQUEST["bNom"];
$bA=$_REQUEST["bAp"];
$bF=$_REQUEST["bFech"];
$bT=$_REQUEST["bTel"];
$bC=$_REQUEST["bContra"];

?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <script type="text/javascript" src="JavaScript/realizarCambios.js"></script>
    <link rel="stylesheet" href="estilos/e_modDatos.css"></link>
    </head>
    <body background="imagenes/uni.jpg">
        <nav id="Principal">
            Cambiar datos para<?php echo(" $n");?>
        </nav>
        <?php
        if(isset($bN)){
            ?>
            <form name="fcambios">
            <br>
            <br>
            <input class="controls" type="text" name="nombres" id="nombres" placeholder="Introduce tu nuevo Nombre"></input>
            <input class="botons" type="button" name="btN" id="btN" value="Cambiar Nombre" onclick="cambioNombre()"> </input>
            </form>
        <?php 
        } 
        if (isset($bA)){
            ?>
            <form name="fcambios">
            <br>
            <br>
            <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Introduce tu nuevo Apellido" ></input>
            <input class="botons" type="button" name="btA" id="btA" value="Cambiar Apellido" onclick="cambioApellido()"> </input>
            </form>
            <?php 
            } 
        if(isset($bF)){
            ?>
            <form name="fcambios">
            <br>
            <br>
            <input class="controls" type="date" name="fechanac" id="fechanac" placeholder="Introduce tu fecha de nacimiento, dd-mm-aaaa"></input>
            <input class="botons" type="button" name="btF" id="btF" value="Cambiar Fecha" onclick="cambioFecha()"> </input>
            </form>
            <?php 
            }
        if(isset($bT)){ 
            ?>
            <form name="fcambios">
            <br>
            <br>
            <input class="controls" type="tel" name="numtelf" id="numtelf" placeholder="Introduce tu nuevo Número de teléfono"></input>
            <input class="botons" type="button" name="btT" id="btT" value="Cambiar Telefono" onclick="cambioNum()"> </input>
            </form>
            <?php 
            }
        if(isset($bC)){ 
            ?>
            <form name="fcambios">
            <br>
            <br>
            <input class="controls" type="password" name="contraseña" id="contraseña" placeholder="Introduce tu nueva contraseña" ></input>
            <input class="botons" type="button" name="btC" id="btC" value="Cambiar Contraseña" onclick="cambioContrasena()"> </input>
            </form>
            <?php
            } 
            ?>

        <input class="botons" type="submit" value="Volver" onclick= "location.href = 'perfil.php'"></input>
    </body>

</html>