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
    document.getElementById('sacarTurno').href = 'chequeoMedico?cod_reserva=' + cod_reserva + '&dni_pasajero=' + dni;
    document.getElementById('turno_chequeo').style.display='block';
}

