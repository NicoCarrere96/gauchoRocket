function mostrarInfo(id) {
    let x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else { 
      x.className = x.className.replace(" w3-show", "");
    }
  }

  function abrirModal(modal) {
    let popUp = document.getElementById(modal);
    popUp.style.display='block';

  }