<br>

<div class="page-header w3-text-white" style="background-image: url('public/img/fondo4.jpg'); background-size: cover ">
    <h1 class="w3-center w3-centered" style="padding-top: 20px;">Reportes - Gaucho Rocket<img src="public/img/rocket.png" height="50px"></h1>
</div>
<div class="w3-half w3-margin-bottom">
    <label><i class="fa fa-calendar-o"></i> Fecha Desde</label>
    <input class="w3-input w3-border" type="date" name="fecha_desde" required>
</div>
<div class="w3-half">
    <label><i class="fa fa-calendar-o"></i> Fecha Hasta</label>
    <input class="w3-input w3-border" type="date" name="fecha_hasta" required>
</div>
<br>

<button onclick="mostrarInfo('factMens')" class="w3-btn w3-block w3-black w3-left-align"><h4>Total Facturación Mensual</h4></button>
<div id="factMens" class="w3-container w3-hide">
<div class="w3-container w3-light-blue w3-center w3-round">

    <h3>Total Facturación Mensual: $<?=  $facturacionMensual[0] ?></h3>
        <a class="w3-btn w3-black" href="reportes?reporte=facturacionMensual">Exportar a PDF</a>
</div>
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

    <a class="w3-btn w3-black" href="reportes?reporte=facturacionPorCliente">Exportar a PDF</a>

</div>
<br><br>
<button onclick="mostrarInfo('tasaOc')" class="w3-btn w3-block w3-black w3-left-align"><h4>Tasa de Ocupacion por Viaje y Equipo</h4></button>
<div id="tasaOc" class="w3-container w3-hide">
<div class="w3-container w3-pale-yellow w3-center w3-round">
    <h3>Tasa de Ocupacion por Viaje y Equipo</h3>
</div>
    <a class="w3-btn w3-black" href="reportes?reporte=tasaDeOcupacion">Exportar a PDF</a>
</div>