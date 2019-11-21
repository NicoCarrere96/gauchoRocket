<?php
include_once("helpers/conexion.php");

function facturacionPorCliente(){

    $conn = getConexion();

    $sql = "SELECT p.nombre, p.apellido,p.dni_persona, SUM(tr.precio) as precio from trayecto tr 
            JOIN reserva_trayecto rt ON tr.id_trayecto = rt.id_trayecto
            JOIN reserva r ON rt.cod_reserva = r.cod_reserva
            JOIN persona p ON r.dni_persona_reserva = p.dni_persona
            group by p.dni_persona";
    $result = mysqli_query($conn, $sql);


    $facturaciones = Array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {

            $facturacion = Array();
            $facturacion['nombre'] =  $row["nombre"];
            $facturacion['apellido'] =  $row["apellido"];
            $facturacion['dni_persona'] =  $row["dni_persona"];
            $facturacion['precio'] =  $row["precio"];
            $facturaciones[] = $facturacion;
        }
    }
    mysqli_close($conn);
    return $facturaciones;
}

function facturacionMensual(){
    $conn = getConexion();
    $sql = "SELECT SUM(tr.precio) FROM trayecto tr
            JOIN reserva_trayecto r ON tr.id_trayecto = r.id_trayecto 
            ";
    $result = mysqli_query($conn, $sql);
    $total = mysqli_fetch_row($result);
    return $total;
}


function tipoCabinaMasVendida(){
    $conn = getConexion();
    $sqlF="select COUNT(*) from reserva where tipo_cabina = 'F'";
    $resultadoF = mysqli_query($conn, $sqlF);
    $cabF=mysqli_fetch_row($resultadoF);
    $sqlG="select COUNT(*) from reserva where tipo_cabina = = 'G'";
    $resultadoG = mysqli_query($conn, $sqlG);
    $cabG=mysqli_fetch_row($resultadoG);
    $sqlS="select COUNT(*) from reserva where tipo_cabina = 'S'";
    $resultadoS = mysqli_query($conn, $sqlS);
    $cabS=mysqli_fetch_row($resultadoS);
    if ($cabF[0] > $cabG[0] && $cabF[0] > $cabS[0] ){
        $Mayor = "Familiar con ".$cabF[0]. " lugares vendidos";
    }elseif ($cabG[0] > $cabF[0] && $cabG[0] > $cabS[0]){
        $Mayor = "General con ".$cabG[0]. " lugares vendidos";
    }elseif ($cabS[0] > $cabF[0] && $cabS[0] > $cabG[0]){
        $Mayor = "Suite con ".$cabS[0]. " lugares vendidos";
    }
    return  $Mayor;
}

function tasaOcupacion(){
    $conn = getConexion();
    $asientosOcupadosEquipo="SELECT COUNT(*), m.descripcion from asientos_ocupados ao
    join vuelo v ON  ao.id_vuelo = v.id_vuelo
    JOIN equipo e ON v.equipo_vuelo = e.id_equipo
    join modelo m on e.modelo_equipo = m.id_modelo
    JOIN cabina c ON e.modelo_equipo = c.cabina_id_modelo
    GROUP BY m.id_modelo";
    $asientosOcupadosVuelo="SELECT COUNT(*), v.id_vuelo from asientos_ocupados ao
    join vuelo v ON  ao.id_vuelo = v.id_vuelo
    JOIN equipo e ON v.equipo_vuelo = e.id_equipo
    join modelo m on e.modelo_equipo = m.id_modelo
    JOIN cabina c ON e.modelo_equipo = c.cabina_id_modelo
    GROUP BY v.id_vuelo";
    $capacidadEquipo="";

    $capacidadVuelo="";


}
