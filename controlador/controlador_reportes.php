<?php

include("modelo/modelo_reportes.php");

function reportes_index(){
    $facturaciones  = facturacionPorCliente();
    $facturacionMensual = facturacionMensual();
    $cabinaMasVendida   =  tipoCabinaMasVendida();
    $tasaOcupacion  = tasaOcupacion();

    isset($_GET['reporte']) ? generaPdf($_GET['reporte']) : "";
    
    include("vista/vista_reportes.php");
}