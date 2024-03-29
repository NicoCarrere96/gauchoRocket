<?php
include_once("helpers/conexion.php");
include_once("helpers/logger.php");
require_once('public/dompdf/autoload.inc.php');
use Dompdf\Dompdf;



function facturacionPorCliente($fecha_desde = 0, $fecha_hasta = 0){

    $conn = getConexion();

    $sql = "SELECT p.nombre, p.apellido, p.dni_persona, SUM(tr.precio) as precio from trayecto tr 
            JOIN reserva_trayecto rt ON tr.id_trayecto = rt.id_trayecto
            JOIN reserva r ON rt.cod_reserva = r.cod_reserva
            JOIN persona p ON r.dni_persona_reserva = p.dni_persona
            JOIN vuelo v on r.reserva_vuelo = id_vuelo";
            
    if($fecha_desde != 0 ){
        $sql .= " WHERE v.fecha BETWEEN '". $fecha_desde ."' AND '". $fecha_hasta ."'";
    }     

    $sql .= " group by p.dni_persona";
    
    $result = mysqli_query($conn, $sql);

    $facturaciones = Array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {

            $facturacion = Array();
            $facturacion['nombre'] =  $row["nombre"];
            $facturacion['apellido'] =  $row["apellido"];
            $facturacion['dni_persona'] =  $row["dni_persona"];
            $facturacion['precio'] =  $row["precio"];
            $facturaciones[] = $facturacion;
        }
    }
    mysqli_close($conn);
    return $facturaciones;
}

function facturacionMensual($fecha_desde = 0, $fecha_hasta = 0){
    $conn = getConexion();
    $sql = "SELECT SUM(tr.precio) FROM trayecto tr
            JOIN reserva_trayecto rt ON tr.id_trayecto = rt.id_trayecto
            JOIN reserva r ON rt.cod_reserva = r.cod_reserva
            JOIN vuelo v on r.reserva_vuelo = id_vuelo";

    if($fecha_desde != 0 ){
        $sql .= " WHERE v.fecha BETWEEN '". $fecha_desde ."' AND '". $fecha_hasta ."'";
    }  

    $result = mysqli_query($conn, $sql);
    $total = mysqli_fetch_row($result);
    return $total;
}

function tasaOcupacion($fecha_desde = 0, $fecha_hasta = 0){
    $totalPorVuelos = totalAsientosPorViaje();
    $totalPorEquipos = totalAsientosPorEquipo();
    $ocupadosPorVuelo = ocupadosPorViaje($fecha_desde, $fecha_hasta);
    $ocupadosPorEquipo = ocupadosPorEquipo();

    $tasaPorVuelos = Array();

    foreach( $totalPorVuelos as $totalPorVuelo ){
        foreach( $ocupadosPorVuelo as $ocupado ){
            if( $totalPorVuelo["id_vuelo"] == $ocupado["id_vuelo"] ){
                $vuelo = Array();
                $vuelo["id_vuelo"] = $ocupado["id_vuelo"];
                $vuelo["ocupacion"] = ($ocupado["ocupados"] / $totalPorVuelo["capacidad"]) * 100;
                $vuelo["ocupados"] = $ocupado["ocupados"];
                $vuelo["capacidad"] = $totalPorVuelo["capacidad"];
                $tasaPorVuelos[] = $vuelo;
            }
        }
    }

    $tasaPorEquipo = Array();

    foreach( $totalPorEquipos as $totalPorEquipo ){
        foreach( $ocupadosPorEquipo as $ocupado ){
            if( $totalPorEquipo["matricula"] == $ocupado["matricula"] ){
                $equipo = Array();
                $equipo["matricula"] = $ocupado["matricula"];
                $equipo["descripcion"] = $ocupado["descripcion"];
                $equipo["ocupacion"] = ( $ocupado["ocupados"] / $totalPorEquipo["capacidad"] ) * 100;
                $equipo["ocupados"] = $ocupado["ocupados"];
                $equipo["capacidad"] = $totalPorEquipo["capacidad"];
                $tasaPorEquipo[] = $equipo;
            }
        }
    }
    $tasaOcupacion = Array("vuelos" => $tasaPorVuelos, "equipos" => $tasaPorEquipo);

    return $tasaOcupacion;

}

function tipoCabinaMasVendida($fecha_desde = 0, $fecha_hasta = 0){

    $cabinaF = cantidadVendidaPorCabina('F', $fecha_desde, $fecha_hasta);
    $cabinaG = cantidadVendidaPorCabina('G', $fecha_desde, $fecha_hasta);
    $cabinaS = cantidadVendidaPorCabina('S', $fecha_desde, $fecha_hasta);

    if ($cabinaF > $cabinaG && $cabinaF > $cabinaS ){
        $mayor = "Familiar con ".$cabinaF. " lugares vendidos";
    } elseif ($cabinaG > $cabinaF && $cabinaG > $cabinaS){
        $mayor = "General con ".$cabinaG. " lugares vendidos";
    } elseif ($cabinaS > $cabinaF && $cabinaS > $cabinaG){
        $mayor = "Suite con ".$cabinaS. " lugares vendidos";
    }
    return  $mayor;
}

function cantidadVendidaPorCabina($tipo_cabina, $fecha_desde = 0, $fecha_hasta = 0){
    $conn = getConexion();

    $sql = " select COUNT(*) from reserva r
           join vuelo v on r.reserva_vuelo = v.id_vuelo
			where r.tipo_cabina = ?";

    if($fecha_desde != 0 ){
        $sql .= " AND v.fecha BETWEEN '". $fecha_desde ."' AND '". $fecha_hasta ."'";
    }


    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $tipo_cabina);

    mysqli_stmt_bind_result($stmt, $cantidad);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_fetch($stmt);

    return $cantidad;
    mysqli_close($conn);
}


function totalAsientosPorViaje(){
    $conn = getConexion();

    $totalAsientos = "SELECT sum(c.capacidad) capacidad, id_vuelo from cabina c
	JOIN equipo e on c.cabina_id_modelo = e.modelo_equipo
    JOIN vuelo v on v.equipo_vuelo = e.id_equipo
    group by v.id_vuelo";

    $resultado = mysqli_query($conn, $totalAsientos);

    $vuelos = Array();
    if(mysqli_num_rows($resultado) > 0){

        while($row = mysqli_fetch_assoc($resultado)){
            $vuelo = Array();
            $vuelo["capacidad"] = $row["capacidad"];
            $vuelo["id_vuelo"] = $row["id_vuelo"];
            $vuelos[] = $vuelo; 
        }
    }

    return $vuelos;
}

function totalAsientosPorEquipo(){
    $conn = getConexion();

    $totalAsientos="SELECT sum(c.capacidad) capacidad, m.descripcion, e.matricula from cabina c
	JOIN modelo m on c.cabina_id_modelo = m.id_modelo
    JOIN equipo e on m.id_modelo = e.modelo_equipo
    group by e.matricula, m.id_modelo";

    $resultado = mysqli_query($conn, $totalAsientos);

    $equipos = Array();
    if(mysqli_num_rows($resultado) > 0){

        while($row = mysqli_fetch_assoc($resultado)){
            $equipo = Array();
            $equipo["capacidad"] = $row["capacidad"];
            $equipo["descripcion"] = $row["descripcion"];
            $equipo["matricula"] = $row["matricula"];
            $equipos[] = $equipo; 
        }
    }

    return $equipos;
}

function ocupadosPorEquipo(){
    $conn = getConexion();

    $totalOcupados="SELECT count(*) ocupados, m.descripcion, e.matricula from asientos_ocupados ao
    JOIN vuelo v ON ao.id_vuelo = v.id_vuelo
    JOIN equipo e ON v.equipo_vuelo = e.id_equipo
    JOIN modelo m on e.modelo_equipo = m.id_modelo
    GROUP BY e.matricula, m.id_modelo";

    $resultado = mysqli_query($conn, $totalOcupados);

    $equipos = Array();
    if(mysqli_num_rows($resultado) > 0){

        while($row = mysqli_fetch_assoc($resultado)){
            $equipo = Array();
            $equipo["ocupados"] = $row["ocupados"];
            $equipo["descripcion"] = $row["descripcion"];
            $equipo["matricula"] = $row["matricula"];
            $equipos[] = $equipo; 
        }
    }

    return $equipos;
}

function ocupadosPorViaje($fecha_desde, $fecha_hasta){
    $conn = getConexion();

    $totalOcupados = "SELECT count(*) ocupados, v.id_vuelo from asientos_ocupados ao
    JOIN vuelo v ON ao.id_vuelo = v.id_vuelo";


    if($fecha_desde != 0 ){
        $totalOcupados .= " WHERE v.fecha BETWEEN '". $fecha_desde ."' AND '". $fecha_hasta ."'";

    }
    $totalOcupados .= " GROUP BY v.id_vuelo";

    $resultado = mysqli_query($conn, $totalOcupados);

    $vuelos = Array();
    if(mysqli_num_rows($resultado) > 0){

        while($row = mysqli_fetch_assoc($resultado)){
            $vuelo = Array();
            $vuelo["ocupados"] = $row["ocupados"];
            $vuelo["id_vuelo"] = $row["id_vuelo"];
            $vuelos[] = $vuelo; 
        }
    }

    return $vuelos;
}

function generaPdf($tipo_reporte, $fecha_desde = 0, $fecha_hasta = 0){

    $html = generarHtml($tipo_reporte, $fecha_desde, $fecha_hasta);

    $pdf = new DOMPDF();
    
    $pdf->setPaper("A4", "portrait");
    
    $pdf->loadHtml(utf8_decode($html));

    $pdf->render();

    ob_end_clean();

    $pdf->stream($tipo_reporte . ".pdf");
}

function generarHtml($tipo_reporte, $fecha_desde = 0, $fecha_hasta = 0){
    $html = '<h1>No valido</h1>';
    
    switch($tipo_reporte){
        case 'cabinaMasVendida':
            $html = reporteCMV($fecha_desde, $fecha_hasta);
            break;

        case 'facturacionMensual':
            $html = reporteFM($fecha_desde, $fecha_hasta);
            break;

        case 'facturacionPorCliente':
            $html = reporteFPC($fecha_desde, $fecha_hasta);
            break;

        case 'tasaDeOcupacion':
            $html = reporteTO($fecha_desde, $fecha_hasta);
            break;
    }
    return $html;
}

function reporteCMV($fecha_desde, $fecha_hasta){
    return "<h1>Cabina mas vendida</h1>
    <section>
        <p>".
            tipoCabinaMasVendida($fecha_desde, $fecha_hasta)
        ."</p>
    </section>";
}

function reporteFM($fecha_desde, $fecha_hasta){
    return "<h1>Facturacion Mensual</h1>
    <section>
        <p>$ ".
            facturacionMensual($fecha_desde, $fecha_hasta)[0]
        ."</p>
    </section>";
}

function reporteFPC($fecha_desde, $fecha_hasta){
    $header = "<h1>Facturacion Mensual</h1>
    <section>";
    $footer = "</section>";
    $table_inicio = "<table>
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Dni</th>
                    <th>Total Facturado</th>
                </tr>
                </thead>

                <tbody>";

    $table_fin = "</tbody>
            </table>";

    $table_body = "";
    
    $facturaciones = facturacionPorCliente($fecha_desde, $fecha_hasta);
    foreach( $facturaciones as $facturacion ){
        $table_body .= "<tr>

        <td>". $facturacion['nombre'] ."</td>
        <td>". $facturacion['apellido'] ."</td>
        <td>". $facturacion['dni_persona'] ."</td>
        <td>". $facturacion['precio'] ."</td>
    </tr>";
    }

    return $header.$table_inicio.$table_body.$table_fin.$footer;
}

function reporteTO($fecha_desde, $fecha_hasta){

    $header = "<h1>Tasa de Ocupacion</h1>
    <section>";
    $footer = "</section>";
    $table_viajes_inicio = "
    <h4>Por Vuelo</h4>
    <table>
    <thead>
    <tr>
        <th>Id del vuelo</th>
        <th>Capacidad</th>
        <th>Ocupados</th>
        <th>Tasa de Ocupacion</th>
    </tr>
    </thead>

    <tbody>";

    $table_viajes_fin = "</tbody>
            </table>";

    $table_viajes_body = "";
    
    $table_equipos_inicio = "
    <h4>Por Equipos</h4>
    <table>
    <thead>
    <tr>
        <th>Matricula</th>
        <th>Modelo</th>
        <th>Capacidad</th>
        <th>Ocupados</th>
        <th>Tasa de Ocupacion</th>
    </tr>
    </thead>
    
    <tbody>";
                    
        $table_equipos_fin = "</tbody>
        </table>";
        
        $table_equipos_body = "";
                    
        
        $tasaOcupacion = tasaOcupacion();
        foreach( $tasaOcupacion["vuelos"] as $vuelo ){
            $table_viajes_body .= "<tr>
    
            <td>".  $vuelo['id_vuelo'] ."</td>
            <td>".  $vuelo['capacidad'] ."</td>
            <td>".  $vuelo['ocupados'] ."</td>
            <td>". number_format($vuelo['ocupacion'], 2) ." %</td>
        </tr>";
        }

        foreach( $tasaOcupacion["equipos"] as $equipo ){
        $table_equipos_body .= "<tr>

            <td>".  $equipo['matricula'] ."</td>
            <td>".  $equipo['descripcion'] ."</td>
            <td>".  $equipo['capacidad'] ."</td>
            <td>".  $equipo['ocupados'] ."</td>
            <td>". number_format($equipo['ocupacion'], 2) ." %</td>
        </tr>";
    }


    return $header.
    $table_viajes_inicio.
    $table_viajes_body.
    $table_viajes_fin.
    "<br>".
    $table_equipos_inicio.
    $table_equipos_body.
    $table_equipos_fin.
    $footer;
}
