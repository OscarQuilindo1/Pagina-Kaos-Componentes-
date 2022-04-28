<?php

require_once __DIR__ . '/vendor/autoload.php';
$collection = (new MongoDB\Client)->mydb->payment;



$nombre= $_POST['nombre'];
$numero= $_POST['numero'];
$cvv= $_POST['cvv'];
$fecha= $_POST['fecha'];




$insertOneResult = $collection->insertOne([
    'nombre' => $nombre,
    'numero' => $numero,
    'cvv' => $cvv,
    'fecha' => $fecha,
]);
header("Location:invoice.php");


?>