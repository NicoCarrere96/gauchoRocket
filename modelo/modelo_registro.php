<?php
include("helpers/conexion.php");

function registrar($email, $password, $nombre, $apellido){
    
    $db_conexion = getConexion();
    
    $query = "SELECT * FROM usuario WHERE email = '".$email."'";
    $resultado = mysqli_query($db_conexion, $query);


    if (mysqli_num_rows($resultado) > 0){

        header('Location: error.php');

    } else {
        
    $insertar_valor = "INSERT INTO usuario (nombre , apellido , email, password) VALUES ('" . $nombre . "', '" . $apellido . "', '" . $email . "', '" .md5($password). "')";

    $registro = mysqli_query($db_conexion,$insertar_valor );
      
    header('Location: login?registro=correcto');

    }

    mysqli_close($db_conexion);

}