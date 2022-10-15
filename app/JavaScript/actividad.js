//document.addEventListener("DOMContentLoaded", function() {
//document.getElementById("anadirAct").addEventListener('submit', validarAnadir); 
function validarAnadir() {
  var idAct = document.getElementById('idAct').value;
  
  if(idAct.length == 0) {
    alert('No has escrito ningun id');
    return;
  }

  var desc = document.getElementById('desc').value;
  var exp_desc = /^[a-zA-ZÀ-ÿ\s]{1,40}$/; //Admite letras y letras con acentos
  if (desc =="" || !exp_desc.test(desc)) {
    alert('No has escrito nada o no has escrito en formato texto');
    return;
  }
  
  var numPl = document.getElementById('numPlazas').value;
  var expr_numPl = /^\d{2}$/;
  if (numPl.length == 0) {
    alert('No has escrito el numero de plazas o el numero de plazas es superior a 100');
    return;
  }

  var fecha = document.getElementById('fecha').value;
  if (fecha.length == 0){
    alert('No has escrito una fecha para la actividad');
    return;
  }

  var lugar = document.getElementById('lugar').value;
  if (lugar.length == 0){
    alert('No has escrito un lugar para la actividad');
    return;
  }
  document.anadirAct.submit()
}
