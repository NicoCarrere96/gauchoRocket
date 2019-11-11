<?php
include("helpers/conexion.php");
include("helpers/logger.php");

function  registrarCheckin($cod_reserva, $dni){

    $db_conexion = getConexion();

    $query = "SELECT * FROM reserva WHERE dni_pasajero = '".$dni."'
              AND cod_reserva = '".$cod_reserva."'  ";
    $resultado = mysqli_query($db_conexion, $query);


    if (mysqli_num_rows($resultado) > 0){
        $realizarCheckin = "UPDATE reserva SET checkin = 1 WHERE dni_pasajero = '". $dni ."'
              AND cod_reserva = '". $cod_reserva ."'";
        $checkin_usuario = mysqli_query($db_conexion,$realizarCheckin);


    }

}