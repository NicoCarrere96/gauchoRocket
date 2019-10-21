<?php
            
include("helpers/conexion.php");
include("helpers/logger.php");

function confirmarUsuario($hash){			
			$conn = getConexion();
				
			$sql = "SELECT * FROM confirmacion WHERE hash='$hash'";				
			$result = mysqli_query($conn, $sql);
				
			if (mysqli_num_rows($result) > 0) {				
				$row = mysqli_fetch_assoc($result);

				$delete = "DELETE FROM confirmacion WHERE hash='$hash'";
				$result = mysqli_query($conn, $delete);			
				
				echo "<div class='alert alert-success alert-dismissible mt-4' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span></button>
                        <p>Cuenta confirmada</p>
                    <p></div>";
			} else {
				echo "Lo siento, ese email no esta registrado.";
		}
	}   