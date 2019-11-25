<br>
<div class="page-header w3-text-white" style="background-image: url('public/img/fondo4.jpg'); background-size: cover ">
    <h1 class="w3-center w3-centered" style="padding-top: 20px;">Tarjeta de embarque<img src="public/img/rocket.png" height="50px"></h1>
</div>


    <div class="w3-container">
        <div class="w3-row">
            <div class="w3-col m8 l8">
                <h3>Tarjeta de embarque <?= $cod_alfanumerico ?></h3>
                <h4>Datos de la reserva: </h4>
                <table class="w3-table w3-bordered">
                    <tr>
                        <th>Código de Reserva :</th>
                        <td><?=$datos_reserva[0]['cod_reserva']?></td>
                    </tr>
                    <tr>
                        <th>Tipo de Viaje :</th>
                        <td><?=$datos_reserva[0]['tipo']?></td>
                    </tr>
                    <tr>
                        <th>Tipo de Cabina :</th>
                        <td><?=$datos_reserva[0]['tipo_cabina']?></td>
                    </tr>
                    <tr>
                        <th>Fecha :</th>
                        <td><?=$datos_reserva[0]['fecha']?> <?=$datos_reserva[0]['hora']?>:00 hs</td>
                    </tr>
                    <tr>
                        <th>Asientos reservados :</th>
                        <td>
                            <?php 
                            foreach( $array_asientos as $asiento){
                                echo " | ". $asiento ." | ";
                            }
                            
                            ?>
                        </td>
                    </tr>
                </table>

                <h4>Datos de los pasajeros: </h4>
                <table class="w3-table w3-bordered">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                            <?php
                                foreach($datos_reserva as $dato){
                                    echo "<tr>
                                        <td>". $dato['nombre'] . "</td>
                                        <td>". $dato['apellido'] . "</td>
                                        <td>". $dato['dni'] . "</td>";
                                }
                            ?>
                    </tr>
                </table>
            </div>
            <div class="w3-col m4 l4">
                <div class="card">
                    <div >
                        <?php
                        $qr = new QR_BarCode();

                        // create text QR code
                        $qr->text("http://localhost:8888/gauchoRocket/tarjeta_embarque?cod_reserva='".$datos_reserva[0]['cod_reserva']."'");

                        // display QR code image
                        
                        $qr->qrCode(350,'temp/cw-qr.png');
                        ?>
                        <img src="temp/cw-qr.png">
                     </div>
                </div>
            </div>
        </div>
    </div><!-- End Page Content -->