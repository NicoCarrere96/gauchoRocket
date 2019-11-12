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
                                ";

                echo "<br>";
                $count++;
            }

            $total = $count * 3000;
        ?>

        </tbody>
    </Table>
    <div class="alert alert-success">
        <strong>Total a abonar $</strong> <?php echo $total?>
    </div>
    <form method="post" action="pagar">
        <div class="form-group">
        <h2>Ingrese Los Datos de Su Tarjeta de Credito</h2>
        <label>Nombre y Apellido Del Titular</label>
        <input type="text" name="nombre" class="form-control">
        <label>DNI</label>
        <input type="text" name="dni" class="form-control">
        <label>Numero de Tarjeta</label>
        <input type="number" name="numeroTarjeta" class="form-control">
        <label>Fecha de Vencimiento</label>
        <input type="date" name="fechaVencimiento" class="form-control">
        <label>Codigo de Seguridad de la Tarjeta</label>
        <input type="number" name="codSeguridad" class="form-control">
        <br>
        </div>
            <button class="w3-button w3-teal w3-center" type="submit" name="btn-pagar">Pagar</button>
    </form>
</div>