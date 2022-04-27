<?php

require_once ("mongo.php");


$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];
$localidad= $_POST['localidad'];
$telefono= $_POST['telefono'];




$insertOneResult = $collection->insertOne([
    'nombre' => $nombre,
    'apellido' => $apellido,
    'localidad' => $localidad,
    'telefono' => $telefono,
]);
header("Location:factura.php");
/*if($_POST){
    $insert= array(
        $nombre= $_POST['nombre'],
        $apellido= $_POST['apellido'],
        $localidad= $_POST['localidad'],
        $telefono= $_POST['telefono'],

    );
if($users->insertOne($insert)){
    echo "data is inserted";        
    }
    else{
        echo "some Issue";
    }
}
else{
    echo "no data";
}*/
?>