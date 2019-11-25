<?php
include_once("helpers/conexion.php");
include_once("helpers/logger.php");

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

function validarPago($cod_reserva){
$conn = getConexion();
$sql = "SELECT pagado FROM reserva 
        WHERE cod_reserva = '". $cod_reserva ."'";

$val_pago = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($val_pago);
if($row["pagado"] == 1) {
    return 1;
} else{
    return 0;
}

}
