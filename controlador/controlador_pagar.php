<?php

include_once('modelo/modelo_pagar.php');
include_once('modelo/modelo_reserva.php');

function pagar_index(){
    if(isset($_POST['numeroTarjeta'])){

        $numeroTarjeta = $_POST['numeroTarjeta'];
        $fechaVencimiento = $_POST['fechaVencimiento'];
        $codSeguridad = $_POST['codSeguridad'];
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $cod_reserva = $_POST['cod_reserva'];
        confirmarPago($cod_reserva);
        if(pagar($numeroTarjeta, $fechaVencimiento, $codSeguridad, $nombre, $dni)){
            header('location:checkin');
        }

    } else {

       $cod_reserva = $_GET['cod_reserva'];
        $datos_reserva = consultarDatosReserva($cod_reserva);
        $pago_realizado = validarPago($cod_reserva);
        switch ($pago_realizado) {
            case 1:
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<div class='w3-container w3-center'>";
                echo "<p>Ya se ha realizado el pago</p>";
                echo "<a href='pagar_reserva'> <button class='w3-btn w3-amber'>Volver</a>";
                echo "</div>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                return;
        }
        include_once('vista/vista_pagar.php');
    }

}