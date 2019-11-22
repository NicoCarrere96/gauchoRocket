<br>
<div class="page-header w3-text-white" style="background-image: url('public/img/fondo4.jpg'); background-size: cover ">
    <h1 class="w3-center w3-centered" style="padding-top: 20px;">Pagar<img src="public/img/rocket.png" height="50px"></h1>
</div>



    <div class="w3-container">
        <div class="w3-row">
            <div class="w3-col m4 l4">
                <h1>Pagar</h1>
                <p></p>
            </div>
            <div class="w3-col m4 l4">
                <h3>Pasos para realizar el pago</h3>
                <h6>1. Ingresa con tu codigo de reserva</h6>
                <h6>2. Controla el detalle de tu factura</h6>
                <h6>3. Ingresa los datos de tu tarjeta y envia el formulario</h6>
            </div>
            <div class="w3-col m4 l4">
                <div class="card">
                    <div class="loginBox">

                        <form action="pagar" method="get">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" name="cod_reserva" placeholder="Codigo De Reserva" required>
                            </div>
                            <button name="btn-checkin" type="submit" class="btn btn-block w3-deep-orange">Pagar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Page Content -->