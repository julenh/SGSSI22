<?php require 'config.php';
session_start();
error_reporting(0);
$n=$_SESSION["user"];
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
        <link rel="stylesheet" href="estilos/e_Actividades.css"/>
        <script type="text/javascript" src="JavaScript/actividad.js"></script>
    </head>
    <body background="imagenes/princ.jpg">
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
        <?php
        if (isset($n)){
        ?>
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
                        <td><h4 type="text" name="id" value="" id="" ><?=$id?></h4></td>
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
        <?php
        }
        else{
            ?>
             <h1 id="tituloPrinc">DEBES <a id="inSes" href="InicioSesion.php"> INICIAR SESIÓN </a> PARA PODER VER Y GESTIONAR ACTIVIDADES</h1>
            <?php
            }
            ?>
    </body>
</html>