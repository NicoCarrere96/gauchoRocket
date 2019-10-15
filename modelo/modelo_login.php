<?php
include("helpers/conexion.php");
include("helpers/logger.php");

function validarLogin($usuario, $password){

    $conn = getConexion();

    $sql = "SELECT * FROM usuario WHERE email ='".$usuario."' AND password='".md5($password)."'"; 
    $consulta = mysqli_query ($conn,$sql);    
    
    if($user = mysqli_fetch_assoc($consulta)) {
        
        $confirmado = "SELECT * FROM confirmacion WHERE hash ='".md5($usuario)."'"; 
        $confirmacion = mysqli_query ($conn,$sql);
        $userConfirm = mysqli_fetch_assoc($consulta);

        if($userConfirm["hash"] != md5($usuario)){
            session_start();
            $_SESSION["logueado"] = TRUE;
            header("location: home");
        } else {
            echo "<div class='w3-container w3-content w3-center' >Falta confirmar su cuenta</div>";
        }
    
    } else {
        echo "<div class='w3-container w3-content w3-center' >Mail o contrase&ntilde;a incorrectos</div>";
        agregarLog("$usuario intento ingresar al sistema");
    }
}