<?php
include_once("helpers/conexion.php");

function buscarVuelo($tipo, $fecha_desde, $fecha_hasta, $origen, $destino){
    $conn = getConexion();

    $sql = "SELECT * FROM vuelo v 
            join tipo_viaje tv on v.tipo_viaje_vuelo = tv.id_tipo_viaje
            join trayecto tr on v.id_vuelo = tr.id_vuelo_trayecto 
            join destino de on tr.origen = de.id_destino
            WHERE (v.fecha BETWEEN '". $fecha_desde ."' AND '". $fecha_hasta ."' )";

    if($tipo != null || $tipo != ""){
        $sql .= "AND tipo_viaje_vuelo = '". $tipo ."'";
    }

    if($origen != null || $origen != ""){
        $sql .= "AND tr.origen = '". $origen ."'";
    }
    if($destino != null || $destino != ""){
        $sql .= "AND tr.destino = '".$destino."'";
    }

    echo $sql;
    $result = mysqli_query($conn, $sql);

    $vuelos = Array();
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $vuelo = Array();
            $vuelo['id_vuelo'] = $row["id_vuelo"];
            $vuelo['tipo_viaje_vuelo'] =  $row["descripcion"];
            $vuelo['origen'] =  $row["descripcion"];
            $vuelo['destino'] =  $row["descripcion"];
            $vuelo['fecha'] = $row["fecha"];
            $vuelos[] = $vuelo;
        }
    }

    mysqli_close($conn);

    return $vuelos;
}

function todosLosVuelos(){
    $conn = getConexion();

    $sql = "SELECT * FROM vuelo v 
          join tipo_viaje tv on v.tipo_viaje_vuelo = tv.id_tipo_viaje
          join trayecto tr on v.id_vuelo = tr.id_vuelo_trayecto 
          join destino de on tr.origen = de.id_destino

           ";

    $result = mysqli_query($conn, $sql);

    $vuelos = Array();
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $vuelo = Array();
            $vuelo['id_vuelo'] = $row["id_vuelo"];
            $vuelo['tipo'] =  $row["descripcion_tv"];
            $vuelo['origen'] =  $row["descripcion"];
            $vuelo['destino'] =  $row["descripcion"];
            $vuelo['fecha'] = $row["fecha"];
            $vuelos[] = $vuelo;
        }
    }

    mysqli_close($conn);

    return $vuelos;
}

function getTipos(){
    $conn = getConexion();

    $sql = "SELECT * FROM tipo_viaje";

    $result = mysqli_query($conn, $sql);

    $tipos = Array();
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $tipo = Array();
            $tipo['id_tipo_viaje'] =  $row["id_tipo_viaje"];
            $tipo['descripcion_tv'] =  $row["descripcion_tv"];
            $tipos[] = $tipo;
        }
    }

    mysqli_close($conn);

    return $tipos;
}

$origenes = getOrigenes();
$destinos = getDestinos();
function getOrigenes(){
    $conn = getConexion();

    $sql = "SELECT DISTINCT descripcion FROM destino
            join trayecto on id_destino = origen";

    $result = mysqli_query($conn, $sql);

    $origenes = Array();
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $origen = Array();
            $origen['origen'] =  $row["descripcion"];
            $origenes[] = $origen;
        }
    }

    mysqli_close($conn);

    return $origenes;
}

function getDestinos(){
    $conn = getConexion();

    $sql = "SELECT DISTINCT descripcion FROM destino
            join trayecto on id_destino = destino";

    $result = mysqli_query($conn, $sql);

    $destinos = Array();
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $destino = Array();
            $destino['destino'] =  $row["descripcion"];
            $destinos[] = $destino;
        }
    }

    mysqli_close($conn);

    return $destinos;
}
?>