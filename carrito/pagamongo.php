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




//insertamos los datos del cliente
//creamos referencia de cliente
session_start();
include("../conexion/conexiones.php");

$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
$password = "";
for($i=0;$i<5;$i++) {
$password .= substr($str,rand(0,64),1);
}
$ref_cliente = $password;


$query = "INSERT INTO pedido_cliente_cp (nombre,apellido,localidad,telefono)
VALUES ('".$_POST["nombre"]."', '".$_POST["apellido"]."', '".$_POST["localidad"]."', '".$_POST["telefono"]."')";
$result = mysqli_query($conexion,$query);





//creamos referencia de pedido
$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
$password = "";
for($i=0;$i<5;$i++) {
$password .= substr($str,rand(0,64),1);
}
$ref = $password;
//insertamos el pedido

if(isset($_SESSION['carrito'])){
    $carrito_mio=$_SESSION['carrito'];
    // $_SESSION['carrito']=$carrito_mio;
    }


            if(isset($_SESSION['carrito'])){
            $total=0;
            for($i=0;$i<=count($carrito_mio)-1;$i ++){
                if(isset($carrito_mio[$i])){
                if($carrito_mio[$i]!=NULL){
        
                    $cantidad = $carrito_mio[$i]['cantidad'];
                    $articulo = $carrito_mio[$i]['nombre'];
                    $precio = $carrito_mio[$i]['precio'];
                    $total_precio = $precio * $cantidad;
                    $query = "INSERT INTO pedido_datos_cp (cantidad,articulo,precio,total)
                    VALUES ('$cantidad', '$articulo', '$precio', '$total_precio')";
                    $result = mysqli_query($conexion,$query); 
           
            }
            }
            }
            }


       
            if(isset($_SESSION['carrito'])){
            $total=0;
            for($i=0;$i<=count($carrito_mio)-1;$i ++){
                if(isset($carrito_mio[$i])){
            if($carrito_mio[$i]!=NULL){ 
            $total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
            }
            }}}
            if(!isset($total)){$total = '0';}else{ $total = $total;}
            //echo $total; 







$ref_user = $ref_cliente;
$estado = 'Falta de pago';
$medio = 'Tarjeta bancaria';
$total_pedido = $total;

$query = "INSERT INTO pedido_cp (cliente,estado,medio,total)
VALUES ('$ref_user', '$estado', '$medio', '$total_pedido')";
$result = mysqli_query($conexion,$query);


unset( $_SESSION["carrito"] ); 

?>