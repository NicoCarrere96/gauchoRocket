<?php

include_once('modelo/modelo_registro.php');

function registro_index(){
    if(isset($_POST["btn-registro"])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        registrar($email, $password, $nombre, $apellido);
    }

    include_once("vista/vista_registro.php");
}
