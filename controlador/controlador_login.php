<?php

include_once('modelo/modelo_login.php');

function login_index(){
    if(isset($_POST["btn-login"])){
        $usuario = $_POST["email"];
        $password = $_POST["password"];
        validarLogin($usuario, $password);
    }
    if(isset($_GET["registro"])){
        echo "Usuario creado correctamente";
    }

    include_once("vista/vista_login.php");
}
