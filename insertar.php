<?php 
$datos = array(

$nombre = $_POST["nombre"],
$correo = $_POST["correo"],
$numero = $_POST["numero"],
$mensaje = $_POST["mensaje"]
);
if($_FILES["archivo"]){
    $nombre_base = basename($_FILES["archivo"]["name"]);
    $nombre_final = date("m-d-y")."-".$nombre."-".$nombre_base; 
    $ruta = "archivos/".$nombre_final;
    $subirarchivo = move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
}else{
    echo "Error al subir archivo";
}


$archivo=fopen($_POST['nombre'].".json","a");
fwrite($archivo, json_encode($datos));
fclose($archivo);

if($resultado = $archivo){
    echo "<script>alert('Se han enviado los datos'); window.location='Contacts.html'</script>";
}else{
    printf("Errormessage: %s\n");
}    


/*    if($subirarchivo){
        $insertarSQL = "INSERT INTO contactos(nombre, correo, numero, mensaje, archivo) VALUES ('$nombre',
        '$correo','$numero','$mensaje', '$ruta')";
        $resultado = mysqli_query($conexion, $insertarSQL);
        if($resultado){
            echo "<script>alert('Se ha subido el archivo'); window.location='Contacts.html'</script>";
        }else{
            printf("Errormessage: %s\n", mysqli_error($conexion));
        }
    }*/
?>