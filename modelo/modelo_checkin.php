<?php
include("helpers/conexion.php");
include("helpers/logger.php");

function  registrarCheckin($cod_reserva){

    $db_conexion = getConexion();

    $query = "SELECT * FROM reserva r
    JOIN persona p ON r.dni_pasajero = p.dni
    WHERE cod_reserva = '".$cod_reserva."'  ";
    $resultado = mysqli_query($db_conexion, $query);

    $pasajeros = Array();
    if (mysqli_num_rows($resultado) > 0){

        while($row = mysqli_fetch_assoc($resultado)){
            $pasajero = Array();
            $pasajero['dni'] = $row['dni'];
            $pasajero['nombre'] = $row['nombre'];
            $pasajero['apellido'] = $row['apellido'];
            $pasajeros[] = $pasajero;
        }

        $realizarCheckin = "UPDATE reserva SET checkin = 1 WHERE cod_reserva = '". $cod_reserva ."'";
        $checkin_usuario = mysqli_query($db_conexion,$realizarCheckin);


    }

    return $pasajeros;

}