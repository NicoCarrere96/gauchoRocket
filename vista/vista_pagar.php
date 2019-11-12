<div class="w3-container w3-margin-top w3-margin">


<h1>Pagar reserva</h1>
<?php

    $flag = 0;
    $count = 0;
    foreach($datos_reserva as $dato){
        if($flag == 0){
            echo $dato['id_vuelo'];

            $flag ++;
        }

        echo $dato['nombre'] . ' ' . $dato['apellido'] . ' ' . $dato['dni'];
        $count++;
    }
    $total = $count * 3000;
    echo "El total a abonar es : $$total";
  ?>

    <form method="post" action="pagar">
        <h2>Ingrese Los Datos de Su Tarjeta de Credito</h2>
        <label>Nombre y Apellido Del Titular</label>
        <input type="text" name="nombre">
        <label>DNI</label>
        <input type="text" name="dni">
        <label>Numero de Tarjeta</label>
        <input type="number" name="numeroTarjeta">
        <label>Fecha de Vencimiento</label>
        <input type="date" name="fechaVencimiento">
        <label>Codigo de Seguridad de la Tarjeta</label>
        <input type="number" name="codSeguridad">

        <button class="w3-button" type="submit" name="btn-pagar">Pagar</button>
    </form>
</div>