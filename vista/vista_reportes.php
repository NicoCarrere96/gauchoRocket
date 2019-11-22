<br>

<div class="page-header w3-text-white" style="background-image: url('public/img/fondo4.jpg'); background-size: cover ">
<h1 class="w3-center w3-centered" style="padding-top: 20px;">Reportes - Gaucho Rocket<img src="public/img/rocket.png" height="50px"></h1>
</div>
<div class="w3-row-padding" style="margin:8px 16px;">
        <form action="reportes" method="post">
            <div class="w3-show-inline-block">
                <label><i class="fa fa-calendar-o"></i> Fecha Desde</label>
                <input class="w3-input w3-border" type="date" name="fecha_desde" required>
            </div>
            <div class="w3-show-inline-block">
                <label><i class="fa fa-calendar-o"></i> Fecha Hasta</label>
                <input class="w3-input w3-border" type="date" name="fecha_hasta" required>
            </div>
            <div class="w3-show-inline-block">
                <button name="btn-reportes"  class="w3-button w3-black" type="submit"><i class="fa fa-search w3-margin-right"></i> Buscar</button>
            </div>
            
        </form>
    </div>
    <br>
    
    <button onclick="mostrarInfo('factMens')" class="w3-btn w3-block w3-black w3-left-align"><h4>Total Facturación Mensual</h4></button>
    <div id="factMens" class="w3-container w3-hide">
<div class="w3-container w3-light-blue w3-center w3-round">
    
    <h3>Total Facturación Mensual: $<?=  $facturacionMensual[0] ?></h3>
    <?php
        if($facturacionMensual[0] == ""){echo "No se encontraron las facturaciones solicitadas";}
        if(isset($fecha_desde)){
         echo "<a class='w3-btn w3-black' href='reportes?reporte=facturacionMensual&fecha_desde=". $fecha_desde ."&fecha_hasta=". $fecha_hasta ."'>";
        } else {
         echo "<a class='w3-btn w3-black' href='reportes?reporte=facturacionMensual'>";
        } ?> Exportar a PDF</a>
</div>
</div>
<br><br>
<button onclick="mostrarInfo('factCl')" class="w3-btn w3-block w3-black w3-left-align"><h4>Facturacion Por Cliente</h4></button>
<div id="factCl" class="w3-container w3-hide">
<div class="w3-container w3-pale-blue w3-center w3-round">
    <h3>Facturación por cliente</h3>
</div>
    <table  class="w3-table-all">

        <thead>
        <tr class="w3-light-grey">
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dni</th>
            <th>Total Facturado</th>
        </tr>
        </thead>

        <tbody>
        <?php
            if(sizeof($facturaciones) == 0){echo "No se encontraron las facturaciones solicitadas";}
            foreach ($facturaciones as $facturacion) {
        ?>
        <tr>

            <td><?= $facturacion['nombre'] ?></td>
            <td><?= $facturacion['apellido'] ?></td>
            <td><?= $facturacion['dni_persona'] ?></td>
            <td><?= $facturacion['precio'] ?></td>
        </tr>
        <?php
            }
        ?>


        </tbody>
    </table>
     <?php if(isset($fecha_desde)){
         echo "<a class='w3-btn w3-black' href='reportes?reporte=facturacionPorCliente&fecha_desde=". $fecha_desde ."&fecha_hasta=". $fecha_hasta ."'>";
     } else {
         echo "<a class='w3-btn w3-black' href='reportes?reporte=facturacionPorCliente'>";
     } ?>       
    Exportar a PDF</a>

</div>
<br><br>
<button onclick="mostrarInfo('cabVen')" class="w3-btn w3-block w3-black w3-left-align"><h4>Cabina Mas Vendida</h4></button>
<div id="cabVen" class="w3-container w3-hide">
<div class="w3-container w3-light-green w3-center w3-round">
    <h3>Cabina más vendida:</h3>
    <h5> <?=$cabinaMasVendida ?></h5>
        <a class="w3-btn w3-black" href="reportes?reporte=cabinaMasVendida">Exportar a PDF</a>
</div>
</div>
<br><br>
<button onclick="mostrarInfo('tasaOc')" class="w3-btn w3-block w3-black w3-left-align"><h4>Tasa de Ocupacion por Viaje y Equipo</h4></button>
<div id="tasaOc" class="w3-container w3-hide">
<div class="w3-container w3-pale-yellow w3-center w3-round">
    <h3>Tasa de Ocupacion por Viaje y Equipo</h3>
</div>
    <h4>Tasa de Ocupacion por Vuelo</h4>    
    <table  class="w3-table-all">
            <thead>
            <tr class="w3-light-grey">
                <th>Id del vuelo</th>
                <th>Capacidad</th>
                <th>Ocupados</th>
                <th>Tasa de Ocupacion</th>
            </tr>
            </thead>

            <tbody>
            <?php
                foreach ($tasaOcupacion["vuelos"] as $vuelo) {
            ?>
            <tr>

                <td><?= $vuelo['id_vuelo'] ?></td>
                <td><?= $vuelo['capacidad'] ?></td>
                <td><?= $vuelo['ocupados'] ?></td>
                <td><?=number_format($vuelo['ocupacion'], 2) ?> %</td>
            </tr>
            <?php
                }
            ?>


            </tbody>
        </table>

        <h4>Tasa de Ocupacion por Equipo</h4>

        <table  class="w3-table-all">
            <thead>
            <tr class="w3-light-grey">
                <th>Matricula</th>
                <th>Modelo</th>
                <th>Capacidad</th>
                <th>Ocupados</th>
                <th>Tasa de Ocupacion</th>
            </tr>
            </thead>

            <tbody>
            <?php
                foreach ($tasaOcupacion["equipos"] as $equipo) {
            ?>
            <tr>

                <td><?= $equipo['matricula'] ?></td>
                <td><?= $equipo['descripcion'] ?></td>
                <td><?= $equipo['capacidad'] ?></td>
                <td><?= $equipo['ocupados'] ?></td>
                <td><?=number_format($equipo['ocupacion'], 2) ?> %</td>
            </tr>
            <?php
                }
            ?>


            </tbody>
        </table>
    <a class="w3-btn w3-black" href="reportes?reporte=tasaDeOcupacion">Exportar a PDF</a>
</div>