   <br>
<div style="background-image: url('public/img/fondo7.jpg'); background-size: cover ">

        <br>
    <div class="w3-padding w3-margin">
        <div class="w3-container w3-deep-orange w3-round">
            <h2><i class="fa fa-rocket w3-margin-right"></i>Buscador de Vuelos</h2>
        </div>
        <div class="w3-container w3-white">
            <form action="home" method="post">

                <div class="w3-row-padding w3-margin">

                    <label>Seleccione tipo de vuelo</label>
                    <?php
                        foreach( $tipos_vuelo as $tipo_vuelo){
                            echo "<input class='w3-radio w3-margin' type='radio' name='tipo' value='". $tipo_vuelo["id_tipo_viaje"] ."' checked>

                            <label>". $tipo_vuelo["descripcion_tv"] ."</label>";

                        }
                    ?>

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
                <div class="w3-row-padding" style="margin:8px -16px;">
                    <div class="w3-half w3-margin-bottom">
                        <label><i class="fa fa-rocket"></i> Origen</label>
                        <select class="w3-select w3-border w3-padding-16 w3-margin-top" name="origen">
                            <option value="" disabled selected>Seleccione Origen</option>
                            <?php
                            foreach( $origenes as $origen ){
                                echo "<option value='". $origen["origen"] ."'>". $origen["origen"] ."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="w3-half" id="destino-div">
                        <label><i class="fa fa-rocket"></i> Destino</label>
                        <select class="w3-select w3-border w3-padding-16 w3-margin-top" id="destino" name="destino">
                            <option value="" disabled selected>Seleccione Destino</option>
                            <?php
                            foreach( $destinos as $destino ){
                                echo "<option value='".$destino["destino"] ."'>". $destino["destino"] ."</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <button name="btn-buscador" class="w3-button w3-dark-grey w3-margin-bottom w3-right" type="submit"><i class="fa fa-search w3-margin-right"></i> Buscar</button>
            </form>
        </div>
    </div>




    <div class="w3-margin w3-container">
        <div class="w3-container w3-deep-orange w3-round">
          <h2><i class="fa fa-rocket w3-margin-right"></i>Vuelos</h2>
        </div>
        <table>

            <tr class='w3-row'>
                <?php
                foreach ( $vuelos as $vuelo){
                    echo   "<td class='w3-third w3-section w3-border w3-white' style='margin: 1% 1%; width: 31%; padding: 1%;'>
                    <h3>". $vuelo['origen'] ;
                    
                    if($vuelo['id_tipo'] == 3){
                        echo " -> ".$vuelo['destino'] ."</h3>";
                    }

                    echo"<h6 class='w3-opacity'>$". $vuelo['precio'] ."</h6>
                    <p>Tipo de vuelo: ". $vuelo['tipo'] ."</p>
                    <p>Fecha: ". $vuelo['fecha'] ."</p>
                    <p>Horario: ". $vuelo['hora'] .":00 hs</p>";
                    if(isset($_SESSION["logueado"])){
                        echo "<button onclick='abrirModalReserva(". $vuelo['id_vuelo'] .")' class='w3-button w3-block w3-black w3-auto'>Reservar</button>";
                        
                    }
                    echo    "</td>";
                    
                }
                ?>
            </tr>
    </table>
    </div>
</div>



    <div class="w3-container" id="contacto">
        <button onclick="mostrarInfo('contactoForm')" class="w3-btn w3-block w3-black w3-left-align"><h4>Contacto</h4></button>
        <div id="contactoForm" class="w3-container w3-hide">
            
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
    <div id="cantidad_pasajeros" class="w3-modal">
        <div class="w3-modal-content">
                <header class="w3-container w3-deep-orange">
                    <span onclick="document.getElementById('cantidad_pasajeros').style.display='none'"
                    class="w3-button w3-display-topright">&times;</span>
                <h2>Ingrese la cantidad de pasajeros</h2>
            </header>
                <form class="w3-container" action="/gauchoRocket/reserva" method="post">
                    <input type="hidden" name="id_vuelo" id="id_vuelo">
                    <label for="cantidad">Pasajeros</label>
                    <input class="w3-input" name="cantidad" type="text">
                    <button class='w3-button w3-block w3-black w3-margin' name="btn-cantidad-pasajeros" type="submit">Enviar</button>
                </form>
        </div>
    </div>


