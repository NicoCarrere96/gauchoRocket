<?php
include_once("helpers/conexion.php");
require_once('public/dompdf/autoload.inc.php');
use Dompdf\Dompdf;



function facturacionPorCliente(){

    $conn = getConexion();

    $sql = "SELECT p.nombre, p.apellido,p.dni_persona, SUM(tr.precio) as precio from trayecto tr 
            JOIN reserva_trayecto rt ON tr.id_trayecto = rt.id_trayecto
            JOIN reserva r ON rt.cod_reserva = r.cod_reserva
            JOIN persona p ON r.dni_persona_reserva = p.dni_persona
            group by p.dni_persona";
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

function facturacionMensual(){
    $conn = getConexion();
    $sql = "SELECT SUM(tr.precio) FROM trayecto tr
            JOIN reserva_trayecto r ON tr.id_trayecto = r.id_trayecto";
    $result = mysqli_query($conn, $sql);
    $total = mysqli_fetch_row($result);
    return $total;
}


function tipoCabinaMasVendida(){

    $cabinaF = cantidadVendidaPorCabina('F');
    $cabinaG = cantidadVendidaPorCabina('G');
    $cabinaS = cantidadVendidaPorCabina('S');

    if ($cabinaF > $cabinaG && $cabinaF > $cabinaS ){
        $mayor = "Familiar con ".$cabinaF. " lugares vendidos";
    } elseif ($cabinaG > $cabinaF && $cabinaG > $cabinaS){
        $mayor = "General con ".$cabinaG. " lugares vendidos";
    } elseif ($cabinaS > $cabinaF && $cabinaS > $cabinaG){
        $mayor = "Suite con ".$cabinaS. " lugares vendidos";
    }
    return  $mayor;
}

function tasaOcupacion(){
    $conn = getConexion();
    $asientosOcupadosEquipo="SELECT COUNT(*), m.descripcion from asientos_ocupados ao
    join vuelo v ON  ao.id_vuelo = v.id_vuelo
    JOIN equipo e ON v.equipo_vuelo = e.id_equipo
    join modelo m on e.modelo_equipo = m.id_modelo
    JOIN cabina c ON e.modelo_equipo = c.cabina_id_modelo
    GROUP BY m.id_modelo";
    $asientosOcupadosVuelo="SELECT COUNT(*), v.id_vuelo from asientos_ocupados ao
    join vuelo v ON  ao.id_vuelo = v.id_vuelo
    JOIN equipo e ON v.equipo_vuelo = e.id_equipo
    join modelo m on e.modelo_equipo = m.id_modelo
    JOIN cabina c ON e.modelo_equipo = c.cabina_id_modelo
    GROUP BY v.id_vuelo";
    $capacidadEquipo="";

    $capacidadVuelo="";


}


function cantidadVendidaPorCabina($tipo_cabina){
    $conn = getConexion();

    $sql = "select COUNT(*) from reserva where tipo_cabina = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $tipo_cabina);

    mysqli_stmt_bind_result($stmt, $cantidad);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_fetch($stmt);

    return $cantidad;
}

function generaPdf($tipo_reporte){

    $html = generarHtml($tipo_reporte);

    $pdf = new DOMPDF();
    
    $pdf->setPaper("A4", "portrait");
    
    $pdf->loadHtml(utf8_decode($html));

    $pdf->render();

    ob_end_clean();

    $pdf->stream($tipo_reporte . ".pdf");
}

function generarHtml($tipo_reporte){
    $html = '<h1>No valido</h1>';
    
    switch($tipo_reporte){
        case 'cabinaMasVendida':
            $html = reporteCMV();
            break;

        case 'facturacionMensual':
            $html = reporteFM();
            break;

        case 'facturacionPorCliente':
            $html = reporteFPC();
            break;

        case 'tasaDeOcupacion':
            $html = reporteTO();
            break;
    }
    return $html;
}

function reporteCMV(){
    return "<h1>Cabina mas vendida</h1>
    <section>
        <p>".
            tipoCabinaMasVendida()
        ."</p>
    </section>";
}

function reporteFM(){
    return "<h1>Facturacion Mensual</h1>
    <section>
        <p>$ ".
            facturacionMensual()[0]
        ."</p>
    </section>";
}

function reporteFPC(){
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
    
    $facturaciones = facturacionPorCliente();
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

function reporteTO(){
    return "Tasa de Ocupacion";
}
