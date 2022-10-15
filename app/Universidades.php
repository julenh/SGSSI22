<?php
error_reporting(0);
include "config.php";
session_start();
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
        <link rel="stylesheet" href="estilos/e_Universidades.css"/>
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
        <section>
            <div class="container-table">
                <div class="table__title">LISTADO DE UNIVERSIDADES</div>
                <div class="table__header">Nombre de la Universidad</div>
                <div class="table__header">Ciudad de la Universidad</div>
                <div class="table__header">Numero de estudiantes Erasmus</div>
                <div class="table__header">Correo</div>
                <div class="table__header">Telefono</div>
                <?php $unis = "SELECT * FROM universidad";
                $res = mysqli_query($conexion, $unis);
                while ($fila = mysqli_fetch_array($res)) {  ?>
                    <div class="table__item"><?php echo ($fila ['nomUni']);?></div>
                    <div class="table__item"><?php echo ($fila ['ciudadUni']);?></div>
                    <div class="table__item"><?php echo ($fila ['numEstudiantes']);?></div>
                    <div class="table__item"><?php echo ($fila ['correo']);?></div>
                    <div class="table__item"><?php echo ($fila ['telf']);?></div>
                    <?php } mysqli_free_result($res); ?>
            </div>
        </section>
    </body>
</html>
