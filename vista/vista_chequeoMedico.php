<div class="w3-container w3-margin-top">

    <h3>Falta realizar chequeo medico de los siguientes pasajeros:</h3>
    <?php
    foreach ($personas_noValidadas as $persona){
        echo "<br><h4>". $persona['nombre'] ." ". $persona['apellido'] ." DNI ". $persona['dni'] ."
               <button onclick=\"abrirModalTurno(". $persona['dni'] .", '". $cod_reserva ."')\">Solicitar Turno</button></h4><br> ";
    }
    ?>
    <div>
        <h6>Una vez que todos hayan realizado el correspondiente chequeo médico, se habilitará la opción para efectuar el pago del viaje</h6>

    </div>
    <div id="turno_chequeo" class="w3-modal">
        <div class="w3-modal-content">
            <header class="w3-container w3-deep-orange">
                    <span onclick="document.getElementById('turno_chequeo').style.display='none'"
                          class="w3-button w3-display-topright">&times;</span>
                <h2>Turno</h2>
            </header>
            <div class="w3-padding-large">
                <label>Seleccione Centro Médico:</label>
                <select>
                    <option value="Buenos Aires">Buenos Aires</option>
                    <option value="Ankara">Ankara</option>
                    <option value="Shangai">Shangai</option>
                </select>
            </div>

            <div class="w3-padding-large">
                <label>Seleccione la fecha:</label>
                <input type="date">
                <a href="" class="w3-button w3-black w3-right" id="sacarTurno" name="btn-valida-chequeo">Sacar Turno</a>
                </div>
        </div>
</div>

