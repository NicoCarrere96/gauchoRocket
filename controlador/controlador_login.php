<?php

include_once('modelo/modelo_login.php');

function login_index(){
    if(isset($_POST["btn-login"])){
        $usuario = $_POST["email"];
        $password = $_POST["password"];
        validarLogin($usuario, $password);
    }
    if(isset($_GET["registro"])){
        echo "<div class='w3-container w3-content w3-center'>Usuario creado correctamente</div>";
    }

    include_once("vista/vista_login.php");
}
