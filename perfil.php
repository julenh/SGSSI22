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
        <meta charset="utf-8">
        <title>Mi Perfil</title>
        <link rel="stylesheet" href="estilos/e_MiPerfil.css"></link>
        <script type="text/javascript" src="JavaScript/editarDato.js"></script>
    </head>
    <body background="imagenes/perfil.jpg">
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
        <ul id=cuerpo>
        <?php
        if (isset($n)){
            ?>
        <form name="formulario" method="POST" action="editarMiPerfil.php">
            <br>
            <h1> PULSA EN TUS DATOS PARA EDITARLOS!</h1>
            <h3> NOMBRE: </h3>
            <?php
            $cons="SELECT * FROM usuario WHERE email='$n'";
            $ejecut=mysqli_query($conexion,$cons);
            $re=mysqli_fetch_array($ejecut);

            $cuentaBanc = $re["cuentaBanc"];

            $cuentaBancDes = descifrar($cuentaBanc, $llave);
            
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
            <h3> CUENTA BANCARIA: </h3>
                <input class="botons" id="bCta" name="bCta" type="submit" value="<?php echo($cuentaBancDes); ?>" onclick="editarCuenta()" ></input>
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
        
        </select>        
                
                <form name="eliminarActividades" method="POST" action="eliminar.php">
                            <input class="controls" name="fechaElim" id="fechaElim" type="date" placeholder="Introduce la fecha que no tengas disponible, aaaa-mm-dd"></input>
                            <input class="botons" type="submit" value="Eliminar" name="botonElim" onclick="eliminarDato()"></input>
                </form>
                <br>
         </section>
                <?php
                }
                else{
            ?>
                <h1 id="tituloPrinc">DEBES <a id="inSes" href="InicioSesion.php"> INICIAR SESIÓN </a> PARA VER TUS DATOS</h1>
            <?php
                }
                ?>
           </ul>     
        </article>
    </body>
</html>
<?php

?>
