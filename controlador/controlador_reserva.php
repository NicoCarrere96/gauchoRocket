<?php

include_once('modelo/modelo_reserva.php');

function reserva_index(){
    if(isset($_POST['btn-cantidad-pasajeros'])){
        $id_vuelo = $_POST['id_vuelo'];
        $cantidad = $_POST['cantidad'];

        if(validarCantidadPasajeros($id_vuelo, $cantidad)){
            include_once("vista/vista_reserva.php");
        } else {
            echo "<p>No hay lugares suficientes</p>";
        }

    }
    if(isset($_POST['btn-reservar'])){
        $id_vuelo = $_POST['id_vuelo'];
        $cantidad = $_POST['cantidad_pasajeros'];
        $tipo_cabina = $_POST['tipo_cabina'];
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

        generarReserva($id_vuelo, $pasajeros, $tipo_cabina);
    }
}