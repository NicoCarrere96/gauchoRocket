<?php

include_once('modelo/modelo_home.php');
include_once('modelo/modelo_pagar.php');

function home_index(){
    if(isset($_POST["btn-buscador"])){

        $origen = "";
        $destino = "";

        $tipo = $_POST["tipo"];
        $fecha_desde = $_POST["fecha_desde"];
        $fecha_hasta = $_POST["fecha_hasta"];
        
        if(isset($_POST["origen"]))
            $origen = $_POST["origen"];
        
        if(isset($_POST["destino"]))
            $destino = $_POST["destino"];
        $vuelos = buscarVuelo($tipo, $fecha_desde, $fecha_hasta, $origen, $destino);
    } else {
        $vuelos = todosLosVuelos();
    }

    $origenes = getOrigenes();
    $destinos = getDestinos();
    $tipos_vuelo = getTipos();

    include("vista/vista_home.php");
}