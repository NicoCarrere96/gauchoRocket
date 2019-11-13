<?php
include_once("helpers/conexion.php");
include_once("helpers/logger.php");

function registrar($nick, $email, $password, $nombre, $apellido, $dni, $direccion, $fecha_nac){
    
    $db_conexion = getConexion();
    
    $query = "SELECT * FROM usuario WHERE nick = '".$nick."'";
    $resultado = mysqli_query($db_conexion, $query);


    if (mysqli_num_rows($resultado) > 0){

        header('Location: erro.php');

    } else {
        $insertar_persona = "INSERT INTO persona (nombre, apellido, dni_persona, direccion, fecha_nac, mail, tipo_pasajero) 
            VALUES ('". $nombre ."','". $apellido ."','". $dni ."', '". $direccion ."','" . $fecha_nac ."','". $email ."', 0)";
        $registro_persona = mysqli_query($db_conexion,$insertar_persona );
        
        $insertar_valor = "INSERT INTO usuario (nick, password, dni_usuario) VALUES ('" . $nick . "', '" .md5($password). "','".$dni."')";
        $registro_usuario = mysqli_query($db_conexion,$insertar_valor );


      
    $guardarHash = "INSERT INTO confirmacion (hash) VALUES ('". md5($nick) ."')";
    $confirmacion = mysqli_query($db_conexion, $guardarHash);

    /* enviarMailConfirmacion(md5($email), $email); */

    header('Location: login?registro=correcto');
    agregarLog("Se registro $nombre $apellido ($nick)");
    }

    mysqli_close($db_conexion);

}

function enviarMailConfirmacion($hash, $nick){
    $subject = "Confirmar usuario";
    $body = "<div>
                <p>Haga click en el siguiente boton para confirmar su cuenta</p>
                <a href='localhost/gauchoRocket2/confirmar?hash=$hash'> <button>Confirmar cuenta</button></a>
                <br>
                <p>En caso de no poder ingresar, <a href='localhost/gauchoRocket2/confirmar?hash=$hash'>localhost/gauchoRocket/confirmar?hash=$hash</a></p>
                <p>Se ruega no contestar este mail</p>
                </div>";
    
    //para el envío en formato HTML 
    $headers = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

    //dirección del remitente 
    $headers .= "From: gauchorocket@no-reply.com\r\n"; 

    //ruta del mensaje desde origen a destino 
    $headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 
    
    mail($nick, $subject, $body, $headers);
}