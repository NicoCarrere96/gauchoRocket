<?php

include("modelo/modelo_reportes.php");

function reportes_index(){
    if(isset($_POST["btn-reportes"])) {
        $fecha_desde = $_POST['fecha_desde'];
        $fecha_hasta = $_POST['fecha_hasta'];

        $facturaciones = facturacionPorCliente($fecha_desde, $fecha_hasta);
        $facturacionMensual = facturacionMensual($fecha_desde, $fecha_hasta);
        $cabinaMasVendida = tipoCabinaMasVendida($fecha_desde, $fecha_hasta);
    } else {
        $facturaciones = facturacionPorCliente();
        $facturacionMensual = facturacionMensual();
        $cabinaMasVendida = tipoCabinaMasVendida();
    }

    $tasaOcupacion = tasaOcupacion();

    if(isset($_GET['reporte'])){
        if(isset($_GET['fecha_desde'])){
            generaPdf($_GET['reporte'], $_GET['fecha_desde'], $_GET['fecha_hasta']);
        } else {
            generaPdf($_GET['reporte']);
        }
    }
    include("vista/vista_reportes.php");
}