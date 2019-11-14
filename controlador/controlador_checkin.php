<?php

include_once('modelo/modelo_checkin.php');
include_once('modelo/modelo_reserva.php');
include_once('modelo/modelo_pagar.php');

function checkin_index()
{
    if (isset($_POST["btn-checkin"])) {
        $cod_reserva = $_POST['cod_reserva'];
        if(verificarPago($cod_reserva)){
            $pasajeros = registrarCheckin($cod_reserva);
            $cabina = getAsientosDisponibles($cod_reserva);
            include_once('vista/vista_selector_asientos.php');
        } else {
            $datos_reserva = consultarDatosReserva($cod_reserva);
            include_once('vista/vista_pagar.php');
        }
    } else {
        include_once('vista/vista_checkin.php');

    }

}