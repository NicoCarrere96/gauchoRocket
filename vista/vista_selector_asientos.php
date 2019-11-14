<br>
<div class="page-header w3-text-white" style="background-image: url('public/img/fondo4.jpg'); background-size: cover ">
    <h1 class="w3-center w3-centered" style="padding-top: 20px;">Seleccionar Asientos<img src="public/img/rocket.png" height="50px"></h1>
</div>



    <div class="w3-container">
        <div class="w3-row">
            <div class="w3-col m8 l8">
                <h3>Asientos</h3>
                <table class="w3-table w3-border">
                  <?php
                    for($i = 0; $i < $cabina['filas']; $i ++){
                        echo "<tr>";
                        for($j = 0; $j < $cabina['asientos']; $j ++){
                            $asiento = Array();
                            $asiento['fila'] = $i;
                            $asiento['asiento'] = $j;

                            if(in_array($asiento, $cabina['ocupadas'])){
                    ?>
                        <td id="asiento-<?=$i?><?=$j?>"
                            class='w3-border w3-panel w3-grey w3-center'
                            >
                            ASIENTO: <?=$i?><?=$j?>

                        </td>
                    <?php
                            } else {
                    ?>

                    <td id="asiento-<?=$i?><?=$j?>"
                    class='w3-border w3-panel w3-red w3-center'
                    onclick='seleccionarAsiento(<?=$i?>, <?=$j?>, <?=sizeOf($pasajeros)?>)'>
                       ASIENTO: <?=$i?><?=$j?>

                        </td>
                            <?php
                            }
                        }
                        echo "</tr>";
                    }  
                        
                    
                    ?>
                </table>
            </div>
            <div class="w3-col m4 l4">
                <div class="card">
                    <div >
                        <form id="asientos-seleccionados" action="tarjeta_embarque?cod_reserva=<?=$cod_reserva?>" method="post">
                            <input type="hidden" name="id_vuelo" value=<?=$cabina['id_vuelo']?> />
                            <input type="hidden" name="tipo_cabina" value=<?=$cabina['descripcion']?> />
                            <button name="btn-asientos" class="w3-button w3-block w3-black w3-margin" type="submit">Enviar</button>
                            <h3>Asientos Seleccionados: </h3>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>