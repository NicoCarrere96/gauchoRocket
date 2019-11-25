<?php

include_once('modelo/modelo_checkin.php');
include_once('modelo/modelo_reserva.php');
include_once('modelo/modelo_pagar.php');

function checkin_index()
{
    if (isset($_POST["btn-checkin"])){
        $cod_reserva = $_POST['cod_reserva'];
        $cabina = getAsientos($cod_reserva);
        $datos_reserva = consultarDatosReserva($cod_reserva);
        $checkin_realizado = validarCheckin($cod_reserva);
        switch($checkin_realizado){
            case 1:
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<div class='w3-container w3-center'>";
                echo "<p>Ya se ha realizado el checkin</p>";
                echo "<a href='checkin'> <button class='w3-btn w3-amber'>Volver</a>";
                echo "</div>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                return;
        }


        if(verificarPago($cod_reserva)){
            $pasajeros = registrarCheckin($cod_reserva);
            include_once('vista/vista_selector_asientos.php');
        } else {
            if($datos_reserva[0]['lista_espera'] == 1){
                if(verificarHorario($datos_reserva[0]['id_vuelo'])){
                    $pasajeros = registrarCheckin($cod_reserva);
                    if($cabina['disponibles'] > sizeOf($pasajeros) ){
                        include_once('vista/vista_pagar.php');
                    } else {
                        $noValido = true;
                        include_once('vista/vista_checkin.php');
                    }
                } else {
                    $noValido = true;
                    include_once('vista/vista_checkin.php');
                }
            } else {
                include_once('vista/vista_pagar.php');
            }
        }
    } else {
        include_once('vista/vista_checkin.php');

    }

}