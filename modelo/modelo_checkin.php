<?php
include("helpers/conexion.php");
include("helpers/logger.php");

function  registrarCheckin($cod_reserva){

    $db_conexion = getConexion();

    $query = "SELECT * FROM reserva r
    JOIN persona p ON r.dni_persona_reserva = p.dni_persona
    WHERE cod_reserva = '".$cod_reserva."'  ";
    $resultado = mysqli_query($db_conexion, $query);

    $pasajeros = Array();
    if (mysqli_num_rows($resultado) > 0){
            
            while($row = mysqli_fetch_assoc($resultado)){
                $pasajero = Array();
                $pasajero['dni'] = $row['dni_persona'];
                $pasajero['nombre'] = $row['nombre'];
                $pasajero['apellido'] = $row['apellido'];
                $pasajeros[] = $pasajero;
            }
            
            $realizarCheckin = "UPDATE reserva SET checkin = 1 WHERE cod_reserva = '". $cod_reserva ."'";
            $checkin_usuario = mysqli_query($db_conexion, $realizarCheckin);

    } else {
        header("location: checkin");
        agregarLog("Se intento realizar checkin de un codigo inexistente: ". $cod_reserva);
    }

    return $pasajeros;

}

function getAsientosDisponibles($cod_reserva){
    $db_conexion = getConexion();
    
    $select_asientos = "SELECT * FROM reserva r
    JOIN vuelo v ON r.reserva_vuelo = v.id_vuelo
    JOIN equipo e ON v.equipo_vuelo = e.id_equipo
    JOIN cabina c ON r.tipo_cabina = c.descripcion AND e.modelo_equipo = c.cabina_id_modelo
    WHERE cod_reserva = '".$cod_reserva."'  ";

    $resultado = mysqli_query($db_conexion, $select_asientos);


    $cabina = Array();
    if (mysqli_num_rows($resultado) > 0){

        $row = mysqli_fetch_assoc($resultado);
        $cabina['cabina_id_modelo'] = $row['cabina_id_modelo'];
        $cabina['filas'] = $row['filas'];
        $cabina['asientos'] = $row['asientos'];
        $cabina['descripcion'] = $row['descripcion'];
        $cabina['id_vuelo'] = $row['id_vuelo'];
        $cabina['ocupadas'] = Array();

        $cabinas_ocupadas = "SELECT * FROM asientos_ocupados
                                WHERE tipo_cabina = '".$cabina['descripcion']."' 
                                AND id_vuelo = ". $cabina['id_vuelo'];

        $res_ocupadas = mysqli_query($db_conexion, $cabinas_ocupadas);

            while ($row_ocupadas = mysqli_fetch_assoc($res_ocupadas)) {
                $cabina_ocupada = Array();
                $cabina_ocupada['fila'] = $row_ocupadas["fila"];
                $cabina_ocupada['asiento'] = $row_ocupadas["asiento"];
                $cabina['ocupadas'][] = $cabina_ocupada;
            }

    }
    return $cabina;


}

function verificarPago($cod_reserva){
    $conn = getConexion();

    $query = "SELECT pagado FROM reserva r
            WHERE cod_reserva = '". $cod_reserva ."'";

    $resulto = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($resulto)){
        return $row["pagado"] == 1;
    }
}