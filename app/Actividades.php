<?php require 'config.php';
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
        <section id="cuerpo">
        <?php
            if (isset($n)){
        ?>
            <h2>
            &nbsp; &nbsp;Aquí encontrarás las actividades que se ofertan, podrás añadir y eliminar una actividad y podrás conseguir tu plaza en cualquiera de ellas, de esta forma tendrás la lista de actividades en las que te has apuntado en tu <a id="linkPerfil" href="perfil.php">PERFIL.</a>  
            </h2>
            <section>
                <div class="container-table">
                <div class="table__title">DATOS DE LA ACTIVIDAD</div>
                    <div class="table__header">Id de la actividad</div>
                    <div class="table__header">Descripción</div>
                    <div class="table__header">Número de plazas</div>
                    <div class ="table__header">Fecha de Actividad</div>
                    <div class ="table__header">Lugar</div>
                    <div class="table__header">Opciones</div>
                    <?php
                
                    $cons="SELECT * FROM actividad";
                    $ejecu = mysqli_query($conexion, $cons);
                    while ($f = mysqli_fetch_array($ejecu)) {  ?>
                       <div class="table__item"><?php echo ($f ['idAct']);?></div>
                        <div class="table__item"><?php echo ($f ['descrip']);?></div>
                        <div class="table__item"><?php echo ($f ['numPlazas']);?></div>
                        <div class="table__item"><?php echo ($f ['fecha']);?></div>
                        <div class="table__item"><?php echo ($f ['lugar']);?></div>
                        <div class="table__item"><a href="editarAct.php? id=<?php echo $f['idAct']; ?>">Editar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="table__item"  href="añadirActUsuario.php? id=<?php echo $f['idAct']; ?>">Añadir</a></div>
                    <?php
                    }
                    
                    ?>
                </div>
            </section>
            <section id=anadir>
                <form name = "anadirAct" action="añadirAct.php" method="POST">
                    <h2>&nbsp;&nbsp;¿QUIERES AÑADIR ALGUNA ACTIVIDAD A LA LISTA GENERAL DE ACTIVIDADES?</h2>
                    <h2>&nbsp;&nbsp;Recuerda que los Id no se pueden repetir</h2>
                    &nbsp;&nbsp;<input class="controls" type="text" name="idAct" id="idAct" placeholder="Introduce el id de Actividad">
                    &nbsp;&nbsp;<input class="controls" type="text" name="desc" id="desc" placeholder="Introduce una breve descripción" >
                    &nbsp;&nbsp;<input class="controls" type="text" name= "numPlazas" id= "numPlazas" placeholder="Introduce el numero de plazas">
                    &nbsp;&nbsp;<input class="controls" type="date" name= "fecha" id= "fecha" placeholder="Introduce la fecha del evento">
                    &nbsp;&nbsp;<input class="controls" type="text" name= "lugar" id= "lugar" placeholder="Introduce el lugar del evento">
                    &nbsp;&nbsp;<input class="botons" type="button" value="AGREGAR" onclick="validarAnadir()">
                    <br> </br>
                </form>
            </section>
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