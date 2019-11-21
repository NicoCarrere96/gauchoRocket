<?php
include_once("helpers/conexion.php");

function pagar($numeroTarjeta, $fechaVencimiento, $codSeguridad, $nombre, $dni){
    return true;
}

function confirmarPago( $cod_reserva ){
    $db_conexion = getConexion();

    $sql = "UPDATE reserva SET pagado = 1 WHERE cod_reserva = ?";

    $stmt = mysqli_prepare($db_conexion, $sql);

    mysqli_stmt_bind_param($stmt, "s", $cod_reserva );

    mysqli_stmt_execute($stmt);

    mysqli_close($db_conexion);

}

function verificarHorario($id_vuelo){
    $conn = getConexion();

    $sql = "SELECT hora_partida, fecha FROM vuelo 
            WHERE id_vuelo = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id_vuelo );

    mysqli_stmt_bind_result($stmt, $hora, $fecha);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_fetch($stmt);

    mysqli_close($conn);

    $date_timezone = timezone_open('America/Argentina/Buenos_Aires');

    $fecha_completa_vuelo = new DateTime($fecha . " " . $hora . ":00:00");
    $fecha_hoy = new DateTime();
    date_timezone_set($fecha_hoy, $date_timezone);

    $fecha_completa_vuelo -> format('d-m-Y H:i:s');
    $fecha_hoy -> format('d-m-Y H:i:s');

    $fecha_hoy -> modify('+ 2 hours');

    if($fecha_hoy >= $fecha_completa_vuelo){
        return true;
    }

    return false;
    
}