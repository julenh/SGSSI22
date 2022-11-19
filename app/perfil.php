<?php
error_reporting(0);
session_start();
include "config.php";
$n=$_SESSION["user"];
?>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Mi Perfil</title>
        <link rel="stylesheet" href="estilos/e_MiPerfil.css"></link>
        <script type="text/javascript" src="JavaScript/editarDato.js"></script>
    </head>
    <body background="imagenes/uni.jpg">
        <nav id="Principal">
            <a class= "menu" href= "index.php">Página Principal  |</a>
            <a class= "menu" href= "Explorar.html">Explorar  |</a>
            <a class= "menu" href= "Actividades.php">Actividades  |</a>
            <a class= "menu" href= "Registro.html">Registro  |</a>
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
                    <a href= "InicioSesion.html">INICIAR SESION</a>
                </div>
                <?php
                    }
                ?>
            
        </nav>
    
    
    <section>
        <ul id=cuerpo>
        <?php
        if (isset($n)){
            ?>
        <form name="formulario" method="post" action="editarMiPerfil.php">
            <br>
            <h1> PULSA EN TUS DATOS PARA EDITARLOS!</h1>
            <h3> NOMBRE: </h3>
            <?php
            $cons="SELECT * FROM usuario WHERE email='$n'";
            $ejecut=mysqli_query($conexion,$cons);
            $re=mysqli_fetch_array($ejecut);
            ?>
                <input class="botons" id="bNom" name="bNom" type="submit" value="<?php echo($re["nombre"]); ?>" onclick="editarNombre()" ></input>
            
            <h3> APELLIDO: </h3>
                <input class="botons" id="bAp" name="bAp" type="submit" value="<?php echo($re["apellido"]); ?>" onclick="editarApellido()" ></input>
            <br>
            <h3> CONTRASEÑA: </h3>
                <input class="botons" id="bContra" name="bContra" type="submit" value="Cambiar Contraseña" onclick="editarContrasena()" ></input>
            <br>
            <h3> TELÉFONO: </h3>
                <input class="botons" id="bTel" name="bTel" type="submit" value="<?php echo($re["telef"]); ?>" onclick="editarTelefono()" ></input>
            <br>
            <h3> FECHA DE NACIMIENTO: </h3>
                <input class="botons" id="bFech" name="bFech" type="submit" value="<?php echo($re["fechanac"]); ?>" onclick="editarFechaNac()" ></input>
            <br>
            <br>
                 ACTIVIDADES EN LAS QUE ESTAS ASIGNADO:
        </form>
                 <select name="listaActi">
                    <option selected value="0"> Ordenado por días </option>
                 <?php 
                 $cons="SELECT DISTINCT fechaActi FROM realizaractividad WHERE email='$n'";
                 $ejecu = mysqli_query($conexion, $cons);
                 $cont=1;
                    while ($f = mysqli_fetch_array($ejecu)) { 
                        $fechaAct=$f['fechaActi'];
                 ?>
                    <optgroup label= <?php echo($f['fechaActi']); ?>>  
                        <?php
                        $c="SELECT descrip FROM actividad INNER JOIN realizaractividad ON actividad.idAct=realizaractividad.idAct WHERE realizaractividad.email='$n' AND realizaractividad.fechaActi='$f[fechaActi]'";
                        $e=mysqli_query($conexion,$c);
                        
                        while ($g = mysqli_fetch_array($e)){
                            ?>
                            <option id="elimAct"> <?php echo($g['descrip']); ?> </option>
                        <?php
                           
                        }
                        ?>
                        
                    </optgroup>
                <?php
                    }
                    ?>
                </article>
                </ul>
                <form name="eliminarActividades" method="post" action="eliminar.php">
                &nbsp;&nbsp;
                &nbsp;&nbsp;<input class="controls" name="fechaElim" id="fechaElim" type="date" placeholder="Introduce la fecha que no tengas disponible, aaaa-mm-dd"> </input>
                &nbsp;&nbsp;<input class="botons" type="submit" value="Eliminar" name="botonElim" onclick="eliminarDato()"> </input>
                <br>
                </form>
                <br>
         </section>
                <?php
                }
                else{
            ?>
                <h1 id="tituloPrinc">DEBES <a id="inSes" href="InicioSesion.html"> INICIAR SESIÓN </a> PARA VER TUS DATOS</h1>
            <?php
                }
                ?>
    </body>
</html>