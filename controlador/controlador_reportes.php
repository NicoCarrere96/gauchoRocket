<?php

include("modelo/modelo_reportes.php");
$facturaciones=facturacionPorCliente();
$facturacionMensual = facturacionMensual();
$cabinaMasVendida=tipoCabinaMasVendida();
$tasaOcupacion=tasaOcupacion();
include("vista/vista_reportes.php");