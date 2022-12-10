<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "arriendum";

$conexion = new mysqli($server, $user, $pass, $db);

if($conexion->connect_errno) {
    die("LA CONEXION HA FALLADO" . $conexion->connect_errno);
}

?>