function anadir(){
    var nombre = document.forms["formulario"]["nombres"].value;
    var apellido = document.forms["formulario"]["apellidos"].value;
    var dni = document.forms["formulario"]["dni"].value;
    var telf = document.forms["formulario"]["numtelf"].value; 
    var correo = document.forms["formulario"]["correo"].value;
    var contrasena = document.forms["formulario"]["contrasena"].value;
    var cuentaBanc = document.forms["formulario"]["cuentaBanc"].value;
    
    if ((comprobarCorreo(correo)==true) && (comprobarNom(nombre)==true) && (comprobarAp(apellido)==true) && (comprobarCuentaBanc(cuentaBanc)== true) && (comprobarDNI(dni)==true) && (comprobartelf(telf)==true) && (comprobarContr(contrasena)==true)){
        event.currentTarget.submit();    
    }
    else{
        event.preventDefault();
    }
}

function comprobarCorreo(correo){
    var expr_correo = /^[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}$/;
    if (correo.match(expr_correo)){
        return true;
    }
    else{
        alert("revise la expresion del e-mail");
        return false;
    }
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
function comprobarDNI(dni){
    var numero
    var letr
    var letra
    var expresion_regular_dni
   
    expresion_regular_dni = /^\d{8}\-[a-zA-Z]$/;
   
    if(expresion_regular_dni.test (dni) == true){
       numero = dni.substr(0,dni.length-2);
       letr = dni.substr(dni.length-1,1);
       numero = numero % 23;
       letra='TRWAGMYFPDXBNJZSQVHLCKET';
       letra=letra.substring(numero,numero+1);
      if (letra!=letr.toUpperCase()) {
         alert('Dni erroneo, la letra del DNI no se corresponde');
         return false;
       }else{
         return true;
       }
    }else{
       alert('Dni erroneo, formato no válido');
       return false;
     }

}
function comprobartelf(telf){
    var expr_telf = /^\d{9}$/;
    if (telf.match(expr_telf)){
        return true;
    }
    else{
        alert("revise la expresion del DNI, debe ser...");
        return false;
    }
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
