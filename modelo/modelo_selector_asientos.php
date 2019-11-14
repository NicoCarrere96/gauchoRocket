<?php
include_once("helpers/conexion.php");
include_once ('modelo/modelo_reserva.php');

function ocuparAsientos($asientos, $tipo_cabina, $id_vuelo, $cod_reserva){
    $conn = getConexion();

    $sql = "INSERT INTO asientos_ocupados(fila, asiento, tipo_cabina, id_vuelo, cod_reserva) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare ($conn,$sql);

    foreach($asientos as $asiento){
        $fila_asiento = explode("-", $asiento);

        mysqli_stmt_bind_param($stmt, "iisis", $fila_asiento[0], $fila_asiento[1],$tipo_cabina, $id_vuelo, $cod_reserva);

        mysqli_stmt_execute($stmt);
    }

    echo mysqli_stmt_error($stmt);

}