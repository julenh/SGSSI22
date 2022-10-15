function editarNombre(){
    window.location = "editarMiPerfil.php";
}
function editarApellido(){
    window.location = "editarMiPerfil.php";
}
function editarContrasena(){
    window.location = "editarMiPerfil.php";
}
function editarTelefono(){
    window.location = "editarMiPerfil.php"; 
}
function editarFechaNac(){
    window.location = "editarMiPerfil.php";
}

function editarCuenta(){
    window.location = "editarMiPerfil.php";
}

function eliminarDato(){
    var fechaAct=document.forms["eliminarActividades"]["fechaElim"].value;
    if (length(fechaAct)>0){
        event.currentTarget.submit();    
    }
    else{
        alert("introduce una fecha válida")
        event.preventDefault();
    }}
