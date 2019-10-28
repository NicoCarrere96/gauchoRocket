<?php

include_once('modelo/modelo_reserva.php');

function reserva_index(){
    if(isset($_GET['reserva'])){
    $cantidad = $_POST['cantidad'];
    pasarCantidad($cantidad);
    }

    include_once("vista/vista_reserva.php");
}