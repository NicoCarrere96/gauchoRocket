<!DOCTYPE html>
<html lang="en">
<title>Gaucho Rocket</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="public/css/w4.css">
<link rel="stylesheet" href="public/css/w3.css">
<link rel="stylesheet" href="public/css/bootstrap.min.css" >
<link rel="stylesheet" href="public/css/custom.css">

<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
</style>
<body>
<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-black w3-card">
        <span class="w3-bar-item w3-white w3-padding-large"><img src="public/img/rocket.png" height="15px">GauchoRocket</span>
        <a href="/gauchoRocket/home" style="text-decoration:none" class="w3-bar-item w3-button w3-padding-large">Home</a>


        <?php
        session_start();

        if(isset($_SESSION["logueado"])){
            if(isset($_SESSION["admin"])){
                echo "<a href='/gauchoRocket/reportes' style=\"text-decoration:none\" class='w3-bar-item w3-button w3-padding-large'>Mantenimiento</a>";
            } else {
                echo "<a href='/gauchoRocket/checkin' style=\"text-decoration:none\" class='w3-bar-item w3-button w3-padding-large'>Check-In</a>";
                echo "<a href='/gauchoRocket/pagar' style=\"text-decoration:none\" class='w3-bar-item w3-button w3-padding-large'>Pagar</a>";
            }

            echo "<a href='/gauchoRocket/login?logout=1' style=\"text-decoration:none\" class='w3-bar-item w3-text-white w3-padding-large w3-display-right'>Cerrar Sesion</a>";
        } else {
            echo "<a href='login' style=\"text-decoration:none\" class='w3-bar-item w3-button w3-padding-large w3-display-right w3-margin-right'>Login</a>";
        }
        ?>
    </div>
</div>

<div class="w3-container-fluid">
<!-- Page content -->

