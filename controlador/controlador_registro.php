<?php

include_once('modelo/modelo_registro.php');

function registro_index(){
    if(isset($_POST["btn-registro"])){
        $nick = $_POST['nick'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $dni = $_POST['dni'];
        $direccion = $_POST['direccion'];
        $fecha_nac = $_POST['fecha_nac'];
        registrar($nick, $email, $password, $nombre, $apellido, $dni, $direccion, $fecha_nac);
    }

    include_once("vista/vista_registro.php");
}
