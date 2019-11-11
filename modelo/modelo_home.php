<?php
include_once("helpers/conexion.php");

function buscarVuelo($tipo, $fecha_desde, $fecha_hasta, $origen, $destino){
    $conn = getConexion();

    $sql = "SELECT * FROM vuelo v 
            join tipo_vuelo tp on v.tipo = tp.id_tipo_vuelo
            WHERE (fecha BETWEEN '". $fecha_desde ."' AND '". $fecha_hasta ."' )";

    if($tipo != null || $tipo != ""){
        $sql .= "AND tipo = '". $tipo ."'";
    }

    if($origen != null || $origen != ""){
        $sql .= "AND origen = '". $origen ."'";
    }
    if($destino != null || $destino != ""){
        $sql .= "AND destino = '".$destino."'";
    }

    echo $sql;
    $result = mysqli_query($conn, $sql);

    $vuelos = Array();
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $vuelo = Array();
            $vuelo['id_vuelo'] = $row["id_vuelo"];
            $vuelo['tipo'] =  $row["descripcion"];
            $vuelo['origen'] =  $row["origen"];
            $vuelo['destino'] =  $row["destino"];
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
            JOIN tipo_vuelo tp ON v.tipo = tp.id_tipo_vuelo";

    $result = mysqli_query($conn, $sql);

    $vuelos = Array();
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $vuelo = Array();
            $vuelo['id_vuelo'] = $row["id_vuelo"];
            $vuelo['tipo'] =  $row["descripcion"];
            $vuelo['origen'] =  $row["origen"];
            $vuelo['destino'] =  $row["destino"];
            $vuelo['fecha'] = $row["fecha"];
            $vuelos[] = $vuelo;
        }
    }

    mysqli_close($conn);

    return $vuelos;
}

function getTipos(){
    $conn = getConexion();

    $sql = "SELECT * FROM tipo_vuelo";

    $result = mysqli_query($conn, $sql);

    $tipos = Array();
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $tipo = Array();
            $tipo['id_tipo_vuelo'] =  $row["id_tipo_vuelo"];
            $tipo['descripcion'] =  $row["descripcion"];
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

    $sql = "SELECT DISTINCT origen FROM vuelo";

    $result = mysqli_query($conn, $sql);

    $origenes = Array();
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $origen = Array();
            $origen['origen'] =  $row["origen"];
            $origenes[] = $origen;
        }
    }

    mysqli_close($conn);

    return $origenes;
}

function getDestinos(){
    $conn = getConexion();

    $sql = "SELECT DISTINCT destino FROM vuelo";

    $result = mysqli_query($conn, $sql);

    $destinos = Array();
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $destino = Array();
            $destino['destino'] =  $row["destino"];
            $destinos[] = $destino;
        }
    }

    mysqli_close($conn);

    return $destinos;
}

?>