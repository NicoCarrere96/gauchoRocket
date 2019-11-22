<?php
include_once("helpers/conexion.php");
include_once("helpers/logger.php");

function validarChequeo($cod_reserva){

    $db_conexion = getConexion();

    $sql = "SELECT * FROM reserva r
            JOIN persona p ON r.dni_persona_reserva = p.dni_persona
            WHERE cod_reserva = '". $cod_reserva ."'";

    $result = mysqli_query($db_conexion, $sql);


    $personas_noAptas = Array();
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $persona = Array();
            $persona['tipo_pasajero'] = $row["tipo_pasajero"];
            if ($persona["tipo_pasajero"] == "0") {
                $persona['nombre'] = $row["nombre"];
                $persona['apellido'] = $row["apellido"];
                $persona['dni'] = $row["dni_persona"];
                $persona['mail'] = $row["mail"];
                $personas_noAptas[] = $persona;
            }

        }
        
    }
    mysqli_close($db_conexion);
    
    return $personas_noAptas;
}

function validarPasajero( $dni ){
    $db_conexion = getConexion();

    $tipo = rand(1,3);

    $sql = "UPDATE persona SET tipo_pasajero = $tipo WHERE dni_persona = $dni";

    $result = mysqli_query($db_conexion, $sql);

    mysqli_close($db_conexion);

}

function guardarTurno( $cod_reserva, $id_centro, $fecha )
{
    $db_conexion = getConexion();

    $sql = "SELECT *
    FROM centro_medico cm
    JOIN turnos_centro_medico tcm ON cm.id_centro_medico = tcm.id_centro
    WHERE tcm.cod_reserva = $cod_reserva";

    $resultado = mysqli_query($db_conexion, $sql);


    if (mysqli_num_rows($resultado) > 0) {

        header('Location: erro.php');

    } else {

        $sql2 = "INSERT INTO turnos_centro_medico (id_centro, cod_reserva, fecha) VALUES('" . $id_centro . "','" . $cod_reserva . "','" . $fecha . "')";

        $result = mysqli_query($db_conexion, $sql2);

        mysqli_close($db_conexion);


    }
}