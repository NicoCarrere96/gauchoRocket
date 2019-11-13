<?php
include_once("helpers/conexion.php");
include_once ('modelo/modelo_reserva.php');

function ocuparAsientos($asientos, $id_cabina, $id_vuelo){
    $conn = getConexion();

    $sql = "INSERT INTO asientos_ocupados(fila, asiento, id_cabina, id_vuelo) VALUES (?,?,?,?)";
    $stmt = mysqli_prepare ($conn,$sql);

    foreach($asientos as $asiento){
        $fila_asiento = explode("-", $asiento);

        mysqli_stmt_bind_param($stmt, "iiss", $fila_asiento[0], $fila_asiento[1], $id_cabina, $id_vuelo);

        mysqli_stmt_execute($stmt);
    }

    echo mysqli_stmt_error($stmt);

}