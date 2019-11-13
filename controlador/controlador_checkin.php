<?php

include_once('modelo/modelo_checkin.php');
include_once('modelo/modelo_reserva.php');

function checkin_index()
{
    echo $_POST['cod_reserva'];
    if (isset($_POST["btn-checkin"])) {
        $cod_reserva = $_POST['cod_reserva'];
        $pasajeros = registrarCheckin($cod_reserva);
        $cabina = getAsientosDisponibles($cod_reserva);
        include_once('vista/vista_selector_asientos.php');
    } else {
        include_once('vista/vista_checkin.php');

    }

}