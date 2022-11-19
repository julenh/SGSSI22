<?php require 'config.php';
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Meet Unifriends</title>
        <link rel="stylesheet" href="estilos/e_Actividades.css"/>
        <script type="text/javascript" src="JavaScript/actividad.js"></script>
    </head>
    <body background="imagenes/princ.jpg">
        <nav id="Principal">
            <a class= "menu" href= "Index.html">Página Principal  |</a>
            <a class= "menu" href= "Explorar.html">Explorar  |</a>
            <a class= "menu" href= "Actividades.php">Actividades  |</a>
            <a class= "menu" href= "Registro.html">Registro  |</a>
            <a class= "menu" href= "perfil.php">Mi Perfil</a>
            <div class="mi">
                <a href= "InicioSesion.html">Inicio Sesión</a>
            </div>
        </nav>
        <section id="cuerpo">
            <h2> &nbsp; &nbsp;En esta página podrás editar la información de la actividad seleccionada pero NO su id.</h2>

            <?php
                $id = $_GET['id'];
                $descrip = $_GET['descrip'];
                $numPlazas = $_GET['numPlazas'];
                $fecha = $_GET['fecha'];
                $lugar = $_GET['lugar'];
            ?>
            <form action="editareditar.php" method="post">
                <table>
                    <tr>
                        <td>&nbsp; &nbsp;EDITA LOS DATOS:</td>
                        <td><input type="text" name="id" style="visibility: hidden;"  value="<?=$id?>" id=""></td>
                    </tr>
                    <tr>
                        <td>&nbsp; &nbsp;Id de la actividad:</td>
                        <td><input type="text" name="id" value="<?=$id?>" id="" ></td>
                    </tr>
                    <tr>
                        <td>&nbsp; &nbsp;Descripción:</td>
                        <td><input type="text" name="descrip" value="<?=$descrip?>" id=""></td>
                    </tr>
                    <tr>
                        <td>&nbsp; &nbsp;Número de plazas:</td>
                        <td><input type="text" name="numPlazas" value="<?=$numPlazas?>" id=""></td>
                    </tr>
                    <tr>
                        <td>&nbsp; &nbsp;Fecha de actividad:</td>
                        <td><input type="date" name="fecha" value="<?=$fecha?>" id=""></td>
                    </tr>
                    <tr>
                        <td>&nbsp; &nbsp;Lugar:</td>
                        <td><input type="text" name="lugar" value="<?=$lugar?>" id=""></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Actualizar"></td>
                        <td><input type="button" value="Volver" onclick= "location.href = 'Actividades.php'"></td>
                    </tr>
        
                </table>

            </form>
        </section>

    </body>
</html>
