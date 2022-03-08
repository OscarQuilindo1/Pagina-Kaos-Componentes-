<?php 
$servidor="localhost";
$usuario="root";
$password="";
$db="kaos";
$conexion=mysqli_connect($servidor,$usuario,$password,$db)or die(mysql_error());

if(!$conexion){
    echo "no conectado";
}
?>