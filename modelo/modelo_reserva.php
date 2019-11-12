<?php
include_once("helpers/conexion.php");

function validarCantidadPasajeros($id_vuelo, $cantidad){
    return true;
}

function generarReserva($reserva_vuelo, $pasajeros, $tipo_cabina){
    $conn = getConexion();

    $generador_codigo = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $cod_reserva = substr(str_shuffle($generador_codigo), 0, 8);

    foreach ($pasajeros as $pasajero){
        $selectPersona = "SELECT * FROM persona WHERE dni_persona = '". $pasajero['dni']."'";
        $resultSelect = mysqli_query($conn, $selectPersona);

        if (!(mysqli_num_rows($resultSelect) > 0)){
            $insertPersona = "INSERT INTO persona
            (nombre, apellido, fecha_nac, dni_persona, direccion, mail) 
            VALUES 
            ('".$pasajero['nombre']."', '".$pasajero['apellido']."', '".$pasajero['fecha_nac']."', ".$pasajero['dni'].", '".$pasajero['direccion']."', '".$pasajero['mail']."')";
            $resultInsertPersona = mysqli_query($conn, $insertPersona);
        }

        $insertReserva = "INSERT INTO reserva
        (dni_persona_reserva, cod_reserva, reserva_vuelo, tipo_cabina, pagado) 
        VALUES
        (".$pasajero['dni'].", '". $cod_reserva. "', '". $reserva_vuelo ."','". $tipo_cabina ."', 0)";


        $resultInsertReserva = mysqli_query($conn, $insertReserva);

        echo mysqli_error($conn);
}

    return $cod_reserva;
}

function consultarDatosReserva($cod_reserva){

    $db_conexion = getConexion();

    $sql = "SELECT * FROM reserva r
            JOIN vuelo v ON r.reserva_vuelo = v.id_vuelo
            JOIN tipo_viaje tv ON v.tipo_viaje_vuelo =  tv.id_tipo_viaje
            JOIN persona p ON r.dni_persona_reserva = p.dni_persona
            WHERE r.cod_reserva = '". $cod_reserva ."'";

    $result = mysqli_query($db_conexion, $sql);

    $datos_reserva = Array();

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $dato = Array();
            $dato['cod_reserva'] = $row["cod_reserva"];
            $dato['tipo'] =  $row["descripcion_tv"];
            $dato['hora'] =  $row["hora_partida"];
            $dato['fecha'] = $row["fecha"];
            $dato['pagado'] = $row["pagado"];
            $dato['tipo_cabina'] = $row['tipo_cabina'];
            $dato['nombre'] = $row["nombre"];
            $dato['apellido'] = $row['apellido'];
            $dato['dni'] = $row['dni_persona'];

            $datos_reserva[] = $dato;

        }
    }
    
    
    return $datos_reserva;

}
?>