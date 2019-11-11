<?php

include_once('modelo/modelo_checkin.php');
function checkin_index()
{
    if (isset($_POST["btn-checkin"])) {
        $cod_reserva = $_POST['cod_reserva'];
        registrarCheckin($cod_reserva);
        include_once('vista/vista_tarjeta_embarque.php');
    } else {
        include_once('vista/vista_checkin.php');
    }

}