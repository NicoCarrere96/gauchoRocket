<?php
include_once("helpers/conexion.php");
include_once("helpers/logger.php");

function registrar($email, $password, $nombre, $apellido){
    
    $db_conexion = getConexion();
    
    $query = "SELECT * FROM usuario WHERE email = '".$email."'";
    $resultado = mysqli_query($db_conexion, $query);


    if (mysqli_num_rows($resultado) > 0){

        header('Location: error.php');

    } else {
        
    $insertar_valor = "INSERT INTO usuario (nombre , apellido , email, password, rol) VALUES ('" . $nombre . "', '" . $apellido . "', '" . $email . "', '" .md5($password). "', 2)";
    $registro = mysqli_query($db_conexion,$insertar_valor );
      
    $guardarHash = "INSERT INTO confirmacion (hash) VALUES ('". md5($email) ."')";
    $confirmacion = mysqli_query($db_conexion, $guardarHash);

    /* enviarMailConfirmacion(md5($email), $email); */

    header('Location: login?registro=correcto');
    agregarLog("Se registro $nombre $apellido ($email)");
    }

    mysqli_close($db_conexion);

}

function enviarMailConfirmacion($hash, $email){
    $subject = "Confirmar usuario";
    $body = "<div>
                <p>Haga click en el siguiente boton para confirmar su cuenta</p>
                <a href='localhost/GauchoRocket/confirmar?hash=$hash'> <button>Confirmar cuenta</button></a>
                <br>
                <p>En caso de no poder ingresar, <a href='localhost/GauchoRocket/confirmar?hash=$hash'>localhost/GauchoRocket/confirmar?hash=$hash</a></p>
                <p>Se ruega no contestar este mail</p>
                </div>";
    
    //para el envío en formato HTML 
    $headers = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

    //dirección del remitente 
    $headers .= "From: gauchorocket@no-reply.com\r\n"; 

    //ruta del mensaje desde origen a destino 
    $headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 
    
    mail($email, $subject, $body, $headers);
}