<?php

include_once('modelo/modelo_buscador.php');

function buscador_index(){
    if(isset($_POST["btn-buscador"])){

        $tipo = $_POST["tipo"];
        $fecha_desde = $_POST["fecha_desde"];
        $fecha_hasta = $_POST["fecha_hasta"];
        $origen = $_POST["origen"];
        $destino = $_POST["destino"];
        buscarVuelo($tipo, $fecha_desde, $fecha_hasta, $origen, $destino);
    }

    include("vista/vista_buscador.php");
}