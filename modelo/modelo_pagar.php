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