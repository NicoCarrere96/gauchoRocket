function mostrarInfo(id) {
    let x = document.getElementById(id);

    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else { 
      x.className = x.className.replace(" w3-show", "");
    }
  }

function abrirModalReserva(idVuelo){
    document.getElementById('id_vuelo').value = idVuelo;
    document.getElementById('cantidad_pasajeros').style.display='block'

}

function abrirModalTurno(dni, cod_reserva){
    document.getElementById('form-turno').action = 'chequeoMedico?cod_reserva=' + cod_reserva + '&dni_pasajero=' + dni;
    document.getElementById('turno_chequeo').style.display='block';
}

function seleccionarAsiento(fila, columna, cantidad_pasajeros){
  let asiento = document.getElementById("asiento-" + fila + columna);
  let form = document.getElementById("asientos-seleccionados");
  let inputExist = document.getElementById(fila + "-" + columna)

  if(form.getElementsByTagName('input').length - 2 >= cantidad_pasajeros && inputExist == null){
    alert("Solo puede seleccionar " + cantidad_pasajeros + " asiento/s");
    return;
  } 

  if(inputExist == null){
    asiento.classList.remove('w3-red');
    asiento.classList.add('w3-green');
    
    let inputFila = document.createElement("input");
    
    inputFila.value = fila + "-" + columna;
    inputFila.setAttribute("readOnly", "true");
    inputFila.name = "asientos[]";
    inputFila.id = fila + "-" + columna;

    form.appendChild(inputFila);

  } else {
    asiento.classList.remove('w3-green');
    asiento.classList.add('w3-red');
    inputExist.remove();
  }



}
$("input:radio[name=tipo]").click(function() {  
  if($(this).is(':checked') && $(this).val() == 3) {  
     $("#destino-div").removeClass('hide');
     $("#destino").attr("disabled", false);
  } else {
    $("#destino-div").addClass('hide');
    $("#destino").attr("disabled", true);
  }
}); 

