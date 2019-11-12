<?php
include("helpers/conexion.php");
include("helpers/logger.php");

function  registrarCheckin($cod_reserva){

    $db_conexion = getConexion();

    $query = "SELECT * FROM reserva r
    JOIN persona p ON r.dni_persona_reserva = p.dni_persona
    WHERE cod_reserva = '".$cod_reserva."'  ";
    $resultado = mysqli_query($db_conexion, $query);

    $pasajeros = Array();
    if (mysqli_num_rows($resultado) > 0){
        while($row = mysqli_fetch_assoc($resultado)){
            $pasajero = Array();
            $pasajero['dni'] = $row['dni_persona'];
            $pasajero['nombre'] = $row['nombre'];
            $pasajero['apellido'] = $row['apellido'];
            $pasajeros[] = $pasajero;
        }

        $realizarCheckin = "UPDATE reserva SET checkin = 1 WHERE cod_reserva = '". $cod_reserva ."'";
        $checkin_usuario = mysqli_query($db_conexion,$realizarCheckin);

    } else {
        header("location: checkin");

    }

    return $pasajeros;

}

function getAsientosDisponibles($cod_reserva){
    $db_conexion = getConexion();
    
    $select_asientos = "SELECT * FROM reserva r
    JOIN vuelo v ON r.reserva_vuelo = v.id_vuelo
    JOIN equipo e ON v.equipo_vuelo = e.id_equipo
    JOIN cabina c ON r.tipo_cabina = c.descripcion AND e.id_equipo = c.cabina_id_modelo 
    WHERE cod_reserva = '".$cod_reserva."'  ";

    $resultado = mysqli_query($db_conexion, $select_asientos);


    $cabina = Array();
    if (mysqli_num_rows($resultado) > 0){

        $row = mysqli_fetch_assoc($resultado);
        $cabina['filas'] = $row['filas'];
        $cabina['asientos'] = $row['asientos'];
        $cabina['descripcion'] = $row['descripcion'];
        

    }

    return $cabina;


}