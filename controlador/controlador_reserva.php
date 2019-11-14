<?php

include_once('modelo/modelo_reserva.php');

function reserva_index(){
    if(isset($_POST['btn-cantidad-pasajeros'])){
        $reserva_vuelo = $_POST['id_vuelo'];
        $tipo_cabina = $_POST['tipo_cabina'];
        $cantidad = $_POST['cantidad'];

        if(validarCantidadPasajeros($reserva_vuelo, $tipo_cabina, $cantidad)){
            include_once("vista/vista_reserva.php");
        } else {
            echo "<p>No hay lugares suficientes</p>";
        }

    }
    if(isset($_POST['btn-reservar'])){
        $reserva_vuelo = $_POST['id_vuelo'];
        $cantidad = $_POST['cantidad_pasajeros'];
        $tipo_cabina = $_POST['tipo_cabina'];
        $tipo_servicio = $_POST['tipo_servicio'];

/*         if(isset($_POST['reserva_trayecto']));{
            $reserva_trayecto = $_POST['reserva_trayecto'];
        } */
        
        $pasajeros = Array();

        for ($i = 1; $i <= $cantidad; $i++){
            $pasajero = Array();
            $pasajero['nombre'] = $_POST["nombre-pasajero-$i"];
            $pasajero['apellido'] = $_POST["apellido-pasajero-$i"];
            $pasajero['direccion'] = $_POST["direccion-pasajero-$i"];
            $pasajero['mail'] = $_POST["email-pasajero-$i"];
            $pasajero['dni'] = $_POST["dni-pasajero-$i"];
            $pasajero['fecha_nac'] = $_POST["fecha_nac-pasajero-$i"];
            $pasajeros[] = $pasajero;
        }

        $cod_reserva = generarReserva($reserva_vuelo, $pasajeros, $tipo_cabina, $tipo_servicio);

        include_once('vista/vista_cod_reserva.php');
    }
}