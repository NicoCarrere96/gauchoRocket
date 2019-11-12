<?php

include_once('modelo/modelo_checkin.php');
include_once('modelo/modelo_reserva.php');

function checkin_index()
{
    if (isset($_POST["btn-checkin"])) {
        $cod_reserva = $_POST['cod_reserva'];
        $pasajeros = registrarCheckin($cod_reserva);
        $cabina = getAsientosDisponibles($cod_reserva);
        var_dump($cabina); 
        include_once('vista/vista_selector_asientos.php');
    } else {
        include_once('vista/vista_checkin.php');

    }

}