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
        $datos_reserva = consultarDatosReserva($_GET['cod_reserva']);
        var_dump($datos_reserva);
        include_once('vista/vista_pagar.php');
    }

}