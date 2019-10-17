<?php

include_once('modelo/modelo_confirmar.php');

function confirmar_index(){
    if(isset($_GET["hash"])){
        confirmarUsuario($_GET["hash"]);
    }
    include_once("vista/vista_login.php");
}
