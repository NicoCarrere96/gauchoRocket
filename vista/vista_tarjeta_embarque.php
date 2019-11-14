<br>
<div class="page-header w3-text-white" style="background-image: url('public/img/fondo4.jpg'); background-size: cover ">
    <h1 class="w3-center w3-centered" style="padding-top: 20px;">Tarjeta de embarque<img src="public/img/rocket.png" height="50px"></h1>
</div>



    <div class="w3-container">
        <div class="w3-row">
            <div class="w3-col m8 l8">
                <h3>Tarjeta de embarque Nº: </h3>
                <h6>Datos de los pasajeros</h6>
                <table class="w3-table w3-bordered">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Asiento</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                        <?php
                        foreach($datos_reserva as $dato){
                            echo "<tr>
                                <td>". $dato['nombre'] . "</td>
                                <td>". $dato['apellido'] . "</td>
                                <td>". $dato['dni'] . "</td>
                                <td></td>
                                ";
                        }
                    ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="w3-col m4 l4">
                <div class="card">
                    <div >
                        <img src="public/img/qr.png" alt="Codigo QR">

                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Page Content -->