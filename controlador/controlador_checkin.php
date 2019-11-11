<?php

include_once('modelo/modelo_checkin.php');
function checkin_index()
{
    if (isset($_POST["btn-checkin"])) {
        $cod_reserva = $_POST['cod_reserva'];
        $dni = $_POST['dni'];
        registrarCheckin($cod_reserva, $dni);
        header('location:home');
    }

    include_once('vista/vista_checkin.php');
}