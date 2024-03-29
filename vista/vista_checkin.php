<br>
<div class="page-header w3-text-white" style="background-image: url('public/img/fondo4.jpg'); background-size: cover ">
    <h1 class="w3-center w3-centered" style="padding-top: 20px;">Check in<img src="public/img/rocket.png" height="50px"></h1>
</div>



    <div class="w3-container">
    <?php
        if(isset($noValido) && $noValido){
            ?>
        <div class="w3-panel w3-red">
            <h3>No esta autorizada su reserva</h3>
            <p>
                Su reserva no se encuentra autorizada para realizar el checkin.
            </p>
        </div> 

            <?php
        }
    ?> 

    <?php
        if(isset($sinAsientos) && $sinAsientos){
            ?>
        <div class="w3-panel w3-red">
            <h3>Debe seleccionar los asientos correspondientes</h3>
        </div> 

            <?php
        }
    ?> 
        <div class="w3-row">
            <div class="w3-col m4 l4">
                <h1>Check-in</h1>
                </p>Realízalo entre 48 y 2 horas antes de la salida de tu vuelo.</p>
            </div>
            <div class="w3-col m4 l4">
                <h3>Pasos para realizar el check-in online</h3>
                <h6>1. Ingresa con tu codigo de reserva</h6>
                <h6>2. Revisa si tu check-in esta disponible y completa el formulario con tus datos</h6>
                <h6>3. Guarda tu tajeta de embarque, tu codigo QR</h6>
                <h6>   y el codigo alfanumerico identificatorio para el abordaje</h6>
            </div>
            <div class="w3-col m4 l4">
                <div class="card">
                    <div class="loginBox">

                        <form action="checkin" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" name="cod_reserva" placeholder="Codigo De Reserva" required>
                            </div>
                            <button name="btn-checkin" type="submit" class="btn btn-block w3-deep-orange">Ingresar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Page Content -->

