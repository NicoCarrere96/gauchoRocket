<?php

include_once('modelo/modelo_pagar.php');


function pagar_index(){
    if(isset($_POST['btn-pagar'])){
    $numeroTarjeta = $_POST['numeroTarjeta'];
    $fechaVencimiento = $_POST['fechaVencimiento'];
    $codSeguridad = $_POST['codSeguridad'];
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    confirmarPago($dni);
    if(pagar($numeroTarjeta, $fechaVencimiento, $codSeguridad, $nombre, $dni)){
    header('location:checkin');

    }
    }
}