function iniciarSesion(){
    var usuarioI= document.getElementById("correo").value;
    var contra= document.getElementById("contr").value;

    if (comprobarUsuario(usuarioI)==true && comprobarContr(contra)==true){
        event.currentTarget.submit();    
    }
    else{
        event.preventDefault();
    }
}

function comprobarUsuario(usuarioI){
    var expr_correo = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/u;
    if (usuarioI.match(expr_correo)){
        return true;
    }
    else{
        alert("revise la expresion del e-mail");
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


