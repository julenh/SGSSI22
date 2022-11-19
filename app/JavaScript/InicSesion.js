function iniciarSesion(){
    var usuarioI= document.getElementById("correo").value;
    var contra= document.getElementById("contr").value;

    if (comprobarUsuario(usuarioI)==true){
        window.location = "InicioSes.php?correo=" + usuarioI + "&contr=" + contra; 
    }
    
}

function comprobarUsuario(usuarioI){
    var expr_correo = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    if (usuarioI.match(expr_correo)){
        return true;
    }
    else{
        alert("revise la expresion del e-mail");
        return false; 

    }
}
