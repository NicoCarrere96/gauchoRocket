<?php
include_once("helpers/conexion.php");
include_once ('modelo/modelo_reserva.php');

function crearTarjetaEmbarque($cod_reserva)
{
    $db_conexion = getConexion();

    $query = "SELECT v.fecha, v.origen, v.destino, r.dni_pasajero, p.nombre, p.apellido, r.tipo_cabina FROM reserva r
	JOIN vuelo v ON r.id_vuelo = v.id_vuelo
    JOIN persona p ON r.dni_pasajero = p.dni
    WHERE cod_reserva = '" . $cod_reserva . "'  ";
    $resultado = mysqli_query($db_conexion, $query);


    $tarjetas = Array();
    if (mysqli_num_rows($resultado) > 0) {

        while($row = mysqli_fetch_assoc($resultado)) {
            $tarjeta = Array();
            $tarjeta['id_vuelo'] = $row["id_vuelo"];
            $tarjeta['tipo'] =  $row["descripcion"];
            $tarjeta['origen'] =  $row["origen"];
            $tarjeta['destino'] =  $row["destino"];
            $tarjeta['fecha'] = $row["fecha"];
            $tarjetas[] = $tarjeta;
        }
    }

    mysqli_close($db_conexion);

    return $tarjetas;
}