function cambioNombre(){
    var nombre=document.getElementById("nombres").value;
    if (comprobarNom(nombre)==true){
        event.currentTarget.submit();    
    }
    else{
        event.preventDefault();
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
        event.currentTarget.submit();    
    }
    else{
        event.preventDefault();
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
    var fecha=document.getElementById("fechanac").value;
    if (length(fecha)>0){
        event.currentTarget.submit();    
    }
    else{
        event.preventDefault();
    }
}
function cambioNum(){
    var numtel=document.getElementById("numtelf").value;
    if (comprobartelf(numtel)==true){
        event.currentTarget.submit();    
    }
    else{
        event.preventDefault();
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
    if (comprobarContr(contra)==true){
        event.currentTarget.submit();    
    }
    else{
        event.preventDefault();
    }
    function comprobarContr(contrasena){
        var expr_contr = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&.])[A-Za-z\d$@$!%*?&.]{8,}$/;
        if (contrasena.match(expr_contr)){
            return true;
        }
        else{
            alert("revise la expresion de la contraseña");
            return false;
        }
    }
}

function cambioCuenta(){
    var cuenta=document.getElementById("cuentaBanc").value;
    if (comprobarCuentaBanc(cuenta)==true){
        event.currentTarget.submit();    
    }
    else{
        event.preventDefault();
    }
    function comprobarCuentaBanc(cuentaBanc){
        var expr_cuentaBanc = /^\d{20}$/;
        if (cuentaBanc.match(expr_cuentaBanc)){
            return true;
        }
        else{
            alert("La cuenta solo debe tener 20 dígitos");
            return false;
        }
    }
}
