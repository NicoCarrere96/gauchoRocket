<?php

include_once('modelo/modelo_chequeoMedico.php');
include_once ('modelo/modelo_reserva.php');

function chequeoMedico_index(){


    if (isset($_GET['cod_reserva'])){

        $cod_reserva = $_GET['cod_reserva'];

        if(isset($_GET['dni_pasajero'])){
            validarPasajero($_GET['dni_pasajero'], $cod_reserva);
        }

        $personas_noValidadas = validarChequeo($cod_reserva);
        if(sizeOf($personas_noValidadas) > 0){

            include_once ('vista/vista_chequeoMedico.php');
        } else {
            $datos_reserva = consultarDatosReserva($cod_reserva);
            include_once ('vista/vista_pagar.php');
        }


    } else{
        header('location:home');
    }
}