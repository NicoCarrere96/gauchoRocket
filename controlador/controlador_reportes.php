<?php

include("modelo/modelo_reportes.php");

function reportes_index(){
    if(isset($_POST["btn-reportes"])) {
        $fecha_desde = $_POST['fecha_desde'];
        $fecha_hasta = $_POST['fecha_hasta'];

        $facturaciones = facturacionPorCliente($fecha_desde, $fecha_hasta);
        $facturacionMensual = facturacionMensual($fecha_desde, $fecha_hasta);
        $cabinaMasVendida = tipoCabinaMasVendida();
        $tasaOcupacion = tasaOcupacion($fecha_desde, $fecha_hasta);

        isset($_GET['reporte']) ? generaPdf($_GET['reporte']) : "";
    }
    include("vista/vista_reportes.php");
}