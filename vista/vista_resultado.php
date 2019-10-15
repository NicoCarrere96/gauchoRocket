<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="rdo">
    <h2 class="w3-wide">Vuelos Disponibles</h2>
    <table class="w3-table">
        <tr>
            <th>Tipo</th>
            <th>Fecha</th>
            <th>Origen</th>
            <th>Destino</th>
        </tr>

        <?php
        foreach ( $vuelos as $vuelo){
            echo   "<tr>
                        <td>" . $vuelo['tipo'] . "</td>   
                        <td>" . $vuelo['fecha'] . "</td>
                        <td>" . $vuelo['origen'] . "</td>
                        <td>" . $vuelo['destino'] . "</td>
                        
                    </tr>";
        }
        ?>
    </table>
</div>
