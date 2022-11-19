function editarNombre(){
    var nombre=document.getElementById("bNom").value;
    window.location = "editarMiPerfil.php?bNom=" + nombre;
}
function editarApellido(){
    var apellido=document.getElementById("bAp").value;
    window.location = "editarMiPerfil.php?bAp=" + apellido;
}
function editarContrasena(){
    var contr=document.getElementById("bContra").value;
    window.location = "editarMiPerfil.php?bContra=" + contr;
}
function editarTelefono(){
    var telef=document.getElementById("bTel").value;
    window.location = "editarMiPerfil.php?bTel=" + telef;
}
function editarFechaNac(){
    var fnac=document.getElementById("bFech").value;
    window.location = "editarMiPerfil.php?bFech=" + fnac;
}

function eliminarDato(){
    var fechaAct=document.getElementById("fechaElim").value;
    window.location = "eliminar.php?fechaElim=" + fechaAct;
}