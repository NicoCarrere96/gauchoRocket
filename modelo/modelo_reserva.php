<?php
include_once("helpers/conexion.php");

function validarCantidadPasajeros($id_vuelo, $cantidad){
    return true;
}

function generarReserva($id_vuelo, $pasajeros, $tipo_cabina){
    $conn = getConexion();

    $generador_codigo = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $cod_reserva = substr(str_shuffle($generador_codigo), 0, 8);

    foreach ($pasajeros as $pasajero){
        $selectPersona = "SELECT * FROM persona WHERE dni = '". $pasajero['dni']."'";
        $resultSelect = mysqli_query($conn, $selectPersona);

        if (!(mysqli_num_rows($resultSelect) > 0)){
            $insertPersona = "INSERT INTO persona
            (nombre, apellido, fecha_nac, dni, direccion, mail) 
            VALUES 
            ('".$pasajero['nombre']."', '".$pasajero['apellido']."', '".$pasajero['fecha_nac']."', '".$pasajero['dni']."', '".$pasajero['direccion']."', '".$pasajero['mail']."')";
            $resultInsertPersona = mysqli_query($conn, $insertPersona);
        }

        $insertReserva = "INSERT INTO reserva
        (dni_pasajero, cod_reserva, id_vuelo, tipo_cabina, pagado, checkin) 
        VALUES
        ('".$pasajero['dni']."', '". $cod_reserva. "', '". $id_vuelo ."', '". $tipo_cabina ."', 0, 0)";
        $resultInsertReserva = mysqli_query($conn, $insertReserva);
    }

    return $cod_reserva;
}

function consultarDatosReserva($cod_reserva){

    $db_conexion = getConexion();

    $sql = "SELECT * FROM reserva r
            JOIN vuelo v ON r.id_vuelo = v.id_vuelo
            JOIN persona p ON r.dni_pasajero = p.dni
            WHERE r.cod_reserva = '". $cod_reserva ."'";

    $result = mysqli_query($db_conexion, $sql);

    $datos_reserva = Array();

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $dato = Array();
            $dato['id_vuelo'] = $row["id_vuelo"];
            $dato['tipo'] =  $row["descripcion"];
            $dato['origen'] =  $row["origen"];
            $dato['destino'] =  $row["destino"];
            $dato['fecha'] = $row["fecha"];
            $dato['nombre'] = $row["nombre"];
            $dato['apellido'] = $row['apellido'];
            $dato['dni'] = $row['dni'];

            $datos_reserva[] = $dato;

        }

    }
    
    
    return $datos_reserva;

}
?>