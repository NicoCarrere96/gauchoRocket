<?php
include_once("helpers/conexion.php");
include_once("helpers/logger.php");

function validarLogin($usuario, $password){
    $passmd5 = md5($password);
    
    $conn = getConexion();
    
    $sql = "SELECT * FROM usuario WHERE nick = ? AND password = ?"; 
    $stmt = mysqli_prepare ($conn,$sql);    
    
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $passmd5);

    mysqli_stmt_bind_result($stmt, $nick, $pass, $admin, $dni);
    mysqli_stmt_execute($stmt);

    
    if($user = mysqli_stmt_fetch($stmt)) {
        
        mysqli_close($conn);
        
        $otraConn = getConexion();
        $hashConfirmacion = md5($usuario);

        $consulta = "SELECT * FROM confirmacion WHERE hash = ?"; 
        
        $stmt_confirmacion = mysqli_prepare ($otraConn,$consulta);
        

        mysqli_stmt_bind_param($stmt_confirmacion, "s", $hashConfirmacion);
        
        mysqli_stmt_execute($stmt_confirmacion);

        if($result = mysqli_stmt_fetch($stmt_confirmacion)){
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<div class='w3-container w3-content w3-center' >Falta confirmar su cuenta</div>";
            agregarLog("Intento ingresar sin confirmar: ". $usuario);
        } else {
            $_SESSION["logueado"] = TRUE;

            if($admin == 1){
                $_SESSION["admin"] = TRUE;
                agregarLog("---INGRESO EL ADMINISTRADOR---");
            }
            header("location: home");
            
        }
        mysqli_close($otraConn);
    
    } else {
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<div class='w3-center' >Mail o contrase&ntilde;a incorrectos</div>";
        agregarLog("$usuario intento ingresar al sistema: Password Incorrecta");
    }

}