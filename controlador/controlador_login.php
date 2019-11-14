<?php

include_once('modelo/modelo_login.php');

function login_index(){
    if(isset($_POST["btn-login"])){
        $usuario = $_POST["nick"];
        $password = $_POST["password"];
        validarLogin($usuario, $password);
    }
    
    if(isset($_GET["registro"])){
        echo "<br><br><br><br><br><br><div class='w3-container w3-content w3-center'>Usuario creado correctamente</div>";
    }

    if(isset($_GET["logout"])){
        session_start();
        session_destroy();
        header("location: home");
    }

    include_once("vista/vista_login.php");
}
