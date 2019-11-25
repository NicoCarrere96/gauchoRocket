<br>
<br>
<div class="w3-panel w3-black w3-leftbar w3-border-blue">
    <h1>Pagar reserva</h1>
    </div>

    <h2>Datos de los Pasajeros</h2>
    <table class="w3-table w3-bordered">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Precio Trayecto</th>
            <th>Destino</th>

        </tr>
        </thead>
        <tbody>
        <?php
            $flag = 0;
            $count = 0;
            foreach($datos_reserva as $dato){
            if($flag == 0){
            //      echo $dato['id_vuelo'];

                    $flag ++;
                }
                echo "<tr>
                                <td>". $dato['nombre'] . "</td>
                                <td>". $dato['apellido'] . "</td>
                                <td>". $dato['dni'] . "</td>
                                <td>$ ". $dato['precio'] . "</td>
                                <td>". $dato['destino'] . "</td>
                                ";

                $count++;
            }

            $total = $count * $dato['precio'];
        ?>

        </tbody>
    </Table>
    <div class="alert alert-success">
        <strong>Total a abonar $</strong> <?php echo $total?>
    </div>
    <form id="form-pagar" method="post" action="pagar">
        <div class="form-group">
        <h2>Ingrese Los Datos de Su Tarjeta de Credito</h2>
        <div id='error' class="w3-panel w3-red hide">
            <h3>Datos Invalidos</h3>
            <p>
                Los datos de su tarjeta son invalidos
            </p>
        
        </div>

        <label>Nombre y Apellido Del Titular</label>
        <input type="text" name="nombre" class="form-control" required>
        <label>DNI</label>
        <input type="text" name="dni" class="form-control" required>
        <label>Numero de Tarjeta</label>
        <input type="text" id="numeroTarjeta" name="numeroTarjeta" class="form-control" required>
        <label>Fecha de Vencimiento</label>
        <input type="date" name="fechaVencimiento" class="form-control" required>
        <label>Codigo de Seguridad de la Tarjeta</label>
        <input type="text" name="codSeguridad" class="form-control" required>
        <input type="hidden" name="cod_reserva" value=<?=$datos_reserva[0]['cod_reserva'] ?>>
        <br>
        </div>
            <button class="w3-button w3-teal w3-center" type="submit" name="btn-pagar">Pagar</button>
    </form>

    <script>
        function validateCardNumber(number) {
            let regex = new RegExp("^[0-9]{16}$");
            if (!regex.test(number))
                return false;

            return luhnCheck(number);
        }

        function luhnCheck(val) {
            let sum = 0;
            for (let i = 0; i < val.length; i++) {
                let intVal = parseInt(val.substr(i, 1));
                if (i % 2 == 0) {
                    intVal *= 2;
                    if (intVal > 9) {
                        intVal = 1 + (intVal % 10);
                    }
                }
                sum += intVal;
            }
            return (sum % 10) == 0;
        }

        document.getElementById('form-pagar').addEventListener('submit', (e) => {
                e.preventDefault();

                let numeroTarjeta = document.getElementById('numeroTarjeta').value;
                if(validateCardNumber(numeroTarjeta)){
                    document.getElementById('form-pagar').submit();
                } else {
                    document.getElementById('error').classList.remove('hide');
                }
        });
    </script>
</div>