function anadir(){
    var nombre = document.forms["formulario"]["nombres"].value;
    var apellido = document.forms["formulario"]["apellidos"].value;
    var dni = document.forms["formulario"]["dni"].value;
    var fnac = document.forms["formulario"]["fechanac"].value;
    var telf = document.forms["formulario"]["numtelf"].value; 
    var correo = document.forms["formulario"]["correo"].value;
    var contrasena = document.forms["formulario"]["contrasena"].value;
    
    if (comprobarCorreo(correo)==true && comprobarNom(nombre)==true && comprobarAp(apellido)==true && comprobarDNI(dni)==true && comprobartelf(telf)==true){
        window.location ="reg.php?nombres="+nombre+"&apellidos="+apellido+"&dni="+dni+"&fechanac="+fnac+"&numtelf="+telf+"&correo="+correo+"&contrasena="+contrasena; 
    }
}

function comprobarCorreo(correo){
    var expr_correo = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    if (correo.match(expr_correo)){
        return true;
    }
    else{
        alert("revise la expresion del e-mail");
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
         alert('Dni erroneo, la letra del NIF no se corresponde');
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
