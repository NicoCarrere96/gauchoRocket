<br>

<div class="page-header w3-text-white" style="background-image: url('public/img/fondo4.jpg'); background-size: cover ">
    <h1 class="w3-center w3-centered" style="padding-top: 20px;">Reportes - Gaucho Rocket<img src="public/img/rocket.png" height="50px"></h1>
</div>
<?php


require_once 'public/dompdf/lib/html5lib/Parser.php';
require_once 'public/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'public/dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'public/dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
?>

<?php
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml('hello world');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();


