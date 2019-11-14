<?php

include_once('modelo/modelo_selector_asientos.php');
include_once('modelo/modelo_reserva.php');

function tarjeta_embarque_index(){

    if(isset($_POST['btn-asientos'])){
        $array_asientos = $_POST['asientos'];
        $id_vuelo = $_POST['id_vuelo'];
        $tipo_cabina = $_POST['tipo_cabina'];
        $cod_reserva = $_GET['cod_reserva'];
        $datos_reserva = consultarDatosReserva($cod_reserva);
        
        ocuparAsientos($array_asientos, $tipo_cabina, $id_vuelo, $cod_reserva);
        
        include_once('vista/vista_tarjeta_embarque.php');

    }
}