
    <br>
    <div class="page-header w3-text-white" style="background-image: url('public/img/fondo4.jpg'); background-size: cover ">
        <h1 class="text-center" style="padding-top: 10px;">Reserva de Vuelo<img src="public/img/rocket.png" height="50px"></h1>
    </div>
    <div class="w3-container w3-margin-left w3-margin-bottom">

        <div class="col-xs-12 nopadding">
            <form action="/gauchoRocket2/reserva" method="post">
            <?php
            for ( $i = 1; $i <= $cantidad; $i++){
                echo "
            <div class='container nopadding'>
            <div class='col-xs-12' id='passenger-".$i."'>
                <h4>Pasajero $i</h4>
            </div>
                <div class='col-xs-12'>
                    <div class='col-xs-12 col-md-6'>
                        <label>Nombres :</label>
                        <input name='nombre-pasajero-$i' type='text' id='nombre-pasajero-$i' class='form-control' placeholder='Nombre completo como figura en el DNI' value=''>
                     </div>

                    <div class='col-xs-12 col-md-6'>
                        <label>Apellido :</label>
                        <input name='apellido-pasajero-$i' type='text' id='apellido-pasajero-$i' class='form-control' placeholder='Apellido completo como figura en el DNI' value=''>
                    </div>
                </div>
                
                <div class='col-xs-12'>
                    <div class='col-xs-12 col-md-6'>
                        <label>Direccion: </label>
                        <input name='direccion-pasajero-$i' type='text' id='direccion-pasajero-$i' class='form-control' placeholder='Direccion' value=''>
                     </div>

                    <div class='col-xs-12 col-md-6'>
                        <label>Email: </label>
                        <input name='email-pasajero-$i' type='email' id='email-pasajero-$i' class='form-control' placeholder='Email' value=''>
                     </div>
                </div>
                

                <div class='col-xs-12'>
                    <div class='col-xs-12 col-md-6'>
                        <label>Número de documento: </label>
                            <input type='text' id='dni-pasajero-$i' class='form-control required' name='dni-pasajero-$i' placeholder='Número de documento' value=''>
                     </div>

                    <div class='col-xs-12 col-md-6'>
                        <label>Fecha de nacimiento: </label>
                        <input type='date' class='form-control' name='fecha_nac-pasajero-$i' id='fecha_nac-pasajero-$i' placeholder='Fecha de Nacimiento' required>
                    </div>

                </div>
                </div>
                ";}
                ?>
                <br>

                <input type="hidden" name="id_vuelo" value="<?=$reserva_vuelo ?>">
                <input type="hidden" name="cantidad_pasajeros" value="<?=$cantidad ?>">
                <br>
                <div>
                    <button class="w3-button w3-black w3-animate-zoom" type="submit" name="btn-reservar">Confirmar Reserva</button>
                </div>
            </form>
            
        </div>
</div>




