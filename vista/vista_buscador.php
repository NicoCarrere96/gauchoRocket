
<header class="w3-display-container w3-content" style="max-width:1500px;">
    <img class="w3-image" src="img/fondo3.jpg" alt="" style="min-width:1000px" width=100%>

    <div class="w3-display-left w3-padding w3-col l6 m8">
        <div class="w3-container w3-deep-orange w3-round">
            <h2><i class="fa fa-rocket w3-margin-right"></i>Buscador de Vuelos</h2>
        </div>
        <div class="w3-container w3-white w3-margin w3-padding-16">
            <form action="/GauchoRocket/resultado" method="post">
                <div class="w3-row-padding w3-margin>

                    <input class="w3-radio" type="radio" name="tipov" value="" >
                    <label>Seleccione tipo de vuelo</label>
                    <input class="w3-radio" type="radio" name="tipo" value="1" checked>
                    <label>Suborbital</label>
                    <input class="w3-radio" type="radio" name="tipo" value="2">
                    <label>Entre Destinos</label>
                    <input class="w3-radio" type="radio" name="tipo" value="3" >
                    <label>Tour Completo</label>

                </div>
                <div class="w3-row-padding" style="margin:8px -16px;">
                    <div class="w3-half w3-margin-bottom">
                        <label><i class="fa fa-calendar-o"></i> Fecha Desde</label>
                        <input class="w3-input w3-border" type="date" name="fecha_desde" required>
                    </div>
                    <div class="w3-half">
                        <label><i class="fa fa-calendar-o"></i> Fecha Hasta</label>
                        <input class="w3-input w3-border" type="date" name="fecha_hasta" required>
                    </div>
                </div>
                <!--<div class="w3-row-padding" style="margin:8px -16px;">
                    <div class="w3-half w3-margin-bottom">
                        <label><i class="fa fa-male"></i> Adultos</label>
                        <input class="w3-input w3-border" type="number" value="1" name="Adultos" min="1" max="6">
                    </div>
                    <div class="w3-half">
                        <label><i class="fa fa-child"></i> Niños</label>
                        <input class="w3-input w3-border" type="number" value="0" name="Niños" min="0" max="6">
                    </div>
                </div> -->
                <div class="w3-row-padding" style="margin:8px -16px;">
                    <div class="w3-half w3-margin-bottom">
                        <label><i class="fa fa-rocket"></i> Origen</label>
                        <select class="w3-select w3-border w3-padding-16 w3-margin-top" name="origen">
                            <option value="" disabled selected>Seleccione Origen</option>
                            <option value="Buenos Aires">Buenos Aires</option>
                            <option value="Ankara">Ankara</option>
                            <option value="" disabled>Entre Destinos</option>
                            <option value="Luna">Luna</option>
                            <option value="Marte">Marte</option>
                            <option value="EEI">EEI</option>
                            <option value="OrbitalHotel">OrbitalHotel</option>
                        </select>
                    </div>
                    <div class="w3-half">
                        <label><i class="fa fa-rocket"></i> Destino</label>
                        <select class="w3-select w3-border w3-margin-top w3-padding" name="destino">
                            <option value="" disabled selected>Seleccione Destino</option>
                            <option value="Luna">Luna</option>
                            <option value="Marte">Marte</option>
                            <option value="EEI">EEI</option>
                            <option value="Europa">Europa</option>
                            <option value="Titan">Titan</option>
                            <option value="OrbitalHotel">OrbitalHotel</option>
                            <option value="Ganimedes">Ganimedes</option>
                        </select>
                    </div>
                </div>

                <button name="btn-buscador" class="w3-button w3-dark-grey" type="submit"><i class="fa fa-search w3-margin-right"></i> Buscar</button>
            </form>
        </div>
    </div>
</header>

  <div class="w3-row-padding w3-margin w3-padding-16">
        <div class="w3-container w3-red">
            <h2><i class="fa fa-rocket w3-margin-right"></i>Alojamientos</h2>
        </div>
        <div class="w3-third w3-margin-bottom">
            <img src="img/hab_simple.jpg" alt="Luna" style="width:100%">
            <div class="w3-container w3-white">
                <h3>Habitacion Simple</h3>
                <h6 class="w3-opacity">Desde $9.999</h6>
                <p>Cama Individual</p>
                <p>15m<sup>2</sup></p>
                <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i></p>
                <!--   <button class="w3-button w3-block w3-black w3-margin-bottom">Elegir Habitacion</button>-->
            </div>
        </div>
        <div class="w3-third w3-margin-bottom">
            <img src="img/hab_doble.jpg" alt="Luna" style="width:100%">
            <div class="w3-container w3-white">
                <h3>Habitacion Doble</h3>
                <h6 class="w3-opacity">Desde $14.999</h6>
                <p>Cama Queen-size</p>
                <p>25m<sup>2</sup></p>
                <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i> <i class="fa fa-tv"></i></p>
                <!--   <button class="w3-button w3-block w3-black w3-margin-bottom">Elegir Habitacion</button>>-->
            </div>
        </div>
        <div class="w3-third w3-margin-bottom">
            <img src="img/hab_lujo.jpg" alt="Luna" style="width:100%">
            <div class="w3-container w3-white">
                <h3>Habitacion Deluxe</h3>
                <h6 class="w3-opacity">Desde $19.999</h6>
                <p>Cama King-size</p>
                <p>40m<sup>2</sup></p>
                <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"></i> <i class="fa fa-wifi"></i> <i class="fa fa-tv"></i> <i class="fa fa-glass"></i> <i class="fa fa-cutlery"></i></p>
          <!--   <button class="w3-button w3-block w3-black w3-margin-bottom">Elegir Habitacion</button>-->
            </div>
        </div>
    </div>
-->

    <div class="w3-container" id="contacto">
        <h2>Contactese</h2>
        <p>Si tiene alguna consulta, no dude en contactarse.</p>
        <i class="fa fa-map-marker w3-text-red" style="width:30px"></i> Moron, Bs.As.<br>
        <i class="fa fa-phone w3-text-red" style="width:30px"></i> Telefono 4468-2039<br>
        <i class="fa fa-envelope w3-text-red" style="width:30px"> </i> Email: gauchorocket@mail.com<br>
        <form action="/contacto.php" target="_blank">
            <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Nombre" required name="Name"></p>
            <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Email" required name="Email"></p>
            <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Mensaje" required name="Mensaje"></p>
            <p><button class="w3-button w3-black w3-padding-large" type="submit">Enviar Mensaje</button></p>
        </form>
    </div>
</div>
</body>
</html>
