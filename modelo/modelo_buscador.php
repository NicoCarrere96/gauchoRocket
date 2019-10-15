<?php
include_once("helpers/conexion.php");
include_once("helpers/logger.php");




function buscarVuelo(){
    $origen = $_POST["origen"];
    $destino = $_POST["destino"];
    $conn = getConexion();

    $sql = "SELECT tp.descripcion as tipo, v.fecha, v.origen, v.destino 
            FROM vuelo v 
            join tipo_vuelo tp on v.tipo = tp.id
            WHERE origen = '".$origen."' AND destino = '".$destino."'";

    $result = mysqli_query($conn, $sql);

    $vuelos = Array();
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $vuelo = Array();
            $vuelo['tipo'] =  $row["tipo"];
            $vuelo['origen'] =  $row["origen"];
            $vuelo['destino'] =  $row["destino"];
            $vuelo['fecha'] = $row["fecha"];
            $vuelos[] = $vuelo;
        }
    }

    mysqli_close($conn);

    return $vuelos;


}
?>