<?php
            
include_once("helpers/conexion.php");
include_once("helpers/logger.php");

function confirmarUsuario($hash){			
			$conn = getConexion();
				
			$sql = "SELECT * FROM confirmacion WHERE hash='$hash'";				
			$result = mysqli_query($conn, $sql);
				
			if (mysqli_num_rows($result) > 0) {				
				$row = mysqli_fetch_assoc($result);

				$delete = "DELETE FROM confirmacion WHERE hash='$hash'";
				$result = mysqli_query($conn, $delete);			
				
				echo "<br><br><br><br><br>
				<div class='alert alert-success alert-dismissible mt-4' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span></button>
                        <p>Cuenta confirmada</p>
                    <p></div>";
			} else {
				echo "Lo siento, ese usuario no esta registrado.";
				agregarLog("No se pudo encontrar un usuario a confirmar: ". $hash);
		}
	}   