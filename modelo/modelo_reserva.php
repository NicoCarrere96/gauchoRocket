<?php
include_once("helpers/conexion.php");

function validarCantidadPasajeros($id_vuelo, $tipo_cabina, $cantidad_pasajeros){
    $conn = getConexion();
    $sql = "SELECT count(*), c.capacidad FROM reserva r
	JOIN vuelo v ON r.reserva_vuelo = v.id_vuelo
    JOIN equipo e ON v.equipo_vuelo = e.id_equipo
    JOIN cabina c ON e.modelo_equipo = c.cabina_id_modelo
    WHERE r.reserva_vuelo = ? 
        AND c.descripcion = ?";

    $stmt = mysqli_prepare($conn,$sql);    
        
    mysqli_stmt_bind_param($stmt, "is", $id_vuelo, $tipo_cabina );
    
    mysqli_stmt_bind_result($stmt, $ocupados, $total);
    
    mysqli_stmt_execute($stmt);

    mysqli_stmt_fetch($stmt);
     
    if($total == $ocupados || $ocupados > $total){
        return 0;
    }

    return ($total - $ocupados) > $cantidad_pasajeros ? 1 : -1;
}

function generarReserva($reserva_vuelo, $pasajeros, $tipo_cabina, $tipo_servicio, $lista_espera, $trayectos){
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
        (dni_persona_reserva, cod_reserva, reserva_vuelo, tipo_cabina,tipo_servicio, lista_espera) 
        VALUES
        (".$pasajero['dni'].", '". $cod_reserva. "', '". $reserva_vuelo ."','". $tipo_cabina ."','". $tipo_servicio ."', $lista_espera)";


        $resultInsertReserva = mysqli_query($conn, $insertReserva);

        if(is_array($trayectos)){
            foreach($trayectos as $trayecto){
                $insertReservaTrayecto = "INSERT INTO reserva_trayecto (cod_reserva, id_trayecto) 
                    VALUES ('". $cod_reserva . "', ". $trayecto .")";
    
                $resultInsertReserva = mysqli_query($conn, $insertReservaTrayecto);
            }
        } else {
            $insertReservaTrayecto = "INSERT INTO reserva_trayecto (cod_reserva, id_trayecto) 
                    VALUES ('". $cod_reserva . "', ". $trayectos .")";
    
            $resultInsertReserva = mysqli_query($conn, $insertReservaTrayecto);
        }



        echo mysqli_error($conn);
}

    return $cod_reserva;
}

function consultarDatosReserva($cod_reserva){

    $db_conexion = getConexion();

    $sql = "SELECT * FROM reserva r
            JOIN vuelo v ON r.reserva_vuelo = v.id_vuelo
            JOIN tipo_viaje tv ON v.tipo_viaje_vuelo =  tv.id_tipo_viaje
            JOIN trayecto tr ON v.id_vuelo = tr.id_vuelo_trayecto
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
            $dato['precio'] = $row['precio'];
            $dato['checkin'] = $row['checkin'];
            $dato['lista_espera'] = $row['lista_espera'];
            $dato['id_vuelo'] = $row['id_vuelo'];


            $datos_reserva[] = $dato;

        }
    }
    
    
    return $datos_reserva;

}

function getTrayectos($reserva_vuelo){
    $conn = getConexion();
    $sql = "SELECT id_trayecto, d.descripcion destino, o.descripcion origen FROM vuelo v
    JOIN trayecto t ON v.id_vuelo = t.id_vuelo_trayecto
    JOIN destino d ON t.destino = d.id_destino
    JOIN destino o ON t.origen = o.id_destino
    WHERE id_vuelo = ?";

    $stmt = mysqli_prepare($conn,$sql);    
        
    mysqli_stmt_bind_param($stmt, "i", $reserva_vuelo);
    
    mysqli_stmt_bind_result($stmt, $id_trayecto, $destino, $origen);
    
    mysqli_stmt_execute($stmt);

    $trayectos = Array();
    while( $row = mysqli_stmt_fetch($stmt)){
        $trayecto = Array();
        $trayecto['id_trayecto'] = $id_trayecto;
        $trayecto['origen'] = $origen;
        $trayecto['destino'] = $destino;
        $trayectos[] = $trayecto;
    }

    return $trayectos;
     
}
?>