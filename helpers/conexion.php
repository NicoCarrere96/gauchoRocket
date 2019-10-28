<?php
include('config.php');

function getConexion(){

    $config = getConfigAsArray();

    $servername = $config['database']['hostname'];
    $username = $config['database']['username'];
    $dbname = $config['database']['database'];
    $password = $config['database']['password'];

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

?>