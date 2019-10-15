<?php

include_once('modelo/modelo_buscador.php');

function resultado_index()
{

    $vuelos = buscarVuelo();
    include_once("vista/vista_resultado.php");
}
?>