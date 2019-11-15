<?php

include_once('modelo/modelo_checkin.php');
include_once('modelo/modelo_reserva.php');
include_once('modelo/modelo_pagar.php');

function checkin_index()
{
    if (isset($_POST["btn-checkin"])){
        $cod_reserva = $_POST['cod_reserva'];
        $cabina = getAsientos($cod_reserva);
        $pasajeros = registrarCheckin($cod_reserva);
        $datos_reserva = consultarDatosReserva($cod_reserva);
        
        if(verificarPago($cod_reserva)){
            include_once('vista/vista_selector_asientos.php');
        } else {
            if($datos_reserva[0]['lista_espera'] == 1){
                if(verificarHorario($datos_reserva[0]['id_vuelo'])){
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
            }
        }
    } else {
        include_once('vista/vista_checkin.php');

    }

}