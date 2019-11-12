<?php
include_once("helpers/conexion.php");

function pagar($numeroTarjeta, $fechaVencimiento, $codSeguridad, $nombre, $dni){
    return true;


}

function confirmarPago( $dni ){
    $db_conexion = getConexion();

    $sql = "UPDATE reserva SET pagado = 1 WHERE dni_pasajero = $dni";

    $result = mysqli_query($db_conexion, $sql);

    mysqli_close($db_conexion);

}