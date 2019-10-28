<?php
include_once("config.php");

function agregarLog($mensaje){
    
    $config = getConfigAsArray();

    $destination = $config['logger']['destination'];
    $extension = $config['logger']['extension'];

    error_log($mensaje."\n", 3, $destination . date("Y-m-d") . $extension);
}