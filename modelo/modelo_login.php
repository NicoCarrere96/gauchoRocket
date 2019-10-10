<?php
include("helpers/conexion.php");

function validarLogin($usuario, $password){

    $conn = getConexion();

    $sql = "SELECT * FROM usuario WHERE email ='".$usuario."' AND password='".md5($password)."'"; 
    $consulta = mysqli_query ($conn,$sql);    
    
    if($user = mysqli_fetch_assoc($consulta)) {
        session_start();
        $_SESSION["logueado"] = TRUE;
        header("location: labanda");
    } else {
        echo "Email o password incorrectos";
    }
}