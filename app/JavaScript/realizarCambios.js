function cambioNombre(){
    var nombre=document.getElementById("nombres").value;
    if (comprobarNom(nombre)==true){
        window.location="realizarCambios.php?nombres="+nombre+"&btN";
    }
    function comprobarNom(nombre){
        var expr_nom = /^[a-zA-ZÀ-ÿ\s]{1,40}$/;
        if (nombre.match(expr_nom)){
            return true;
        }
        else{
            alert("revise la expresion del nombre, solo debe tener letras");
            return false;
        }
    }
}
function cambioApellido(){
    var apellido=document.getElementById("apellidos").value;
    if (comprobarAp(apellido)==true){
        window.location = "realizarCambios.php?apellidos="+apellido+"&btA";
    }
    function comprobarAp(apellido){
        var expr_ap = /^[a-zA-ZÀ-ÿ\s]{1,40}$/;
        if (apellido.match(expr_ap)){
            return true;
        }
        else{
            alert("revise la expresion del apellido, debe ser solo texto");
            return false;
        }
    }  
}
function cambioFecha(){
    var f=document.getElementById("fechanac").value;
    window.location = "realizarCambios.php?fechanac="+f+"&btF";
}
function cambioNum(){
    var num=document.getElementById("numtelf").value;
    if (comprobartelf(num)==true){
        window.location = "realizarCambios.php?numtelf="+num+"&btT";
    }
    function comprobartelf(num){
        var expr_telf = /^\d{9}$/;
        if (num.match(expr_telf)){
            return true;
        }
        else{
            alert("introduzca 9 números");
            return false;
        }
    } 
}
function cambioContrasena(){
    var contra=document.getElementById("contraseña").value;
    alert(contra);
    window.location = "realizarCambios.php?contraseña="+contra+"&btC";
}