<?php
function tarjeta_embarque_index(){

        if(isset($_POST['btn-asientos'])){
               $array_asientos = $_POST['asientos'];
        }
        include_once('vista/vista_tarjeta_embarque.php');

}