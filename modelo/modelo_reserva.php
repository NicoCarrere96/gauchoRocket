<?php
include_once("helpers/conexion.php");

function validarCantidadPasajeros($id_vuelo, $cantidad){
    return true;
}

function generarReserva($id_vuelo, $pasajeros, $tipo_cabina){
    $conn = getConexion();

    $cod_reserva = rand(0,100);

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
        (dni_pasajero, cod_reserva, id_vuelo, tipo_cabina, pagado) 
        VALUES
        ('".$pasajero['dni']."', '". $cod_reserva. "', '". $id_vuelo ."', '". $tipo_cabina ."', 0)";
        $resultInsertReserva = mysqli_query($conn, $insertReserva);
    }
}

?>