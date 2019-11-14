<?php

include_once('modelo/modelo_selector_asientos.php');
include_once ('modelo/modelo_reserva.php');
include_once('vista/vista_tarjeta_embarque.php');

function tarjeta_embarque_index(){

    if(isset($_POST['btn-asientos'])){
            $array_asientos = $_POST['asientos'];
            $id_vuelo = $_POST['id_vuelo'];

            $tipo_cabina = $_POST['tipo_cabina'];

            ocuparAsientos($array_asientos, $tipo_cabina, $id_vuelo);

        }

    if (isset($_GET['cod_reserva'])) {

        $cod_reserva = $_GET['cod_reserva'];
        $datos_reserva = consultarDatosReserva($cod_reserva);
        include_once('vista/vista_tarjeta_embarque.php');
    }
}