<?php 

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$numero = $_POST["numero"];
$mensaje = $_POST["mensaje"];
$datos=[];

/* El siguiente if me permite cambiar el nombre del archivo que el usuario seleccion,
cambiar su ruta de destino y almacenarlo en una carpeta especifica, funciona tanto para la implementación
mediante  un json como para subir el archivo a la base de datos*/
if($_FILES["archivo"]){
    $nombre_base = basename($_FILES["archivo"]["name"]);
    $nombre_final = date("m-d-y")."-".$nombre."-".$nombre_base; 
    $ruta = "archivos/".$nombre_final;
    $subirarchivo = move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
}else{
    echo "Error al subir archivo";
}
/*Se agregan todos los tados enviados por el usuario a un archivo .json el cual resive nombre,correo,
numero, mensaje y ademas se le agrega una liena extra de codigo para expecificar donde se guarda
la imagen o archivo subido*/ 
$data = "data/db.json";
$puntero = @fopen($data, "a+");


if(!$puntero)
{	  
   echo 'NOK';
}
else
{
  array_push($datos,array ('nombre' => $nombre));
  array_push($datos,array ('correo' => $correo));
  array_push($datos,array ('numero' => $numero));
  array_push($datos,array ('mensaje' => $mensaje));
  $nombre_final = "archivos/".$nombre_final;
  array_push($datos,array($nombre_final));  
  $datos = json_encode($datos);
  fwrite($puntero,$datos);
}

//Este if genera un alert que le dice al usuario que su datos fueron enviados y lo retorna a la pagina Contacts
if($resultado = $puntero){
    echo "<script>alert('Se han enviado los datos'); window.location='Contacts.html'</script>";
}else{
    printf("Errormessage: %s\n");
}    


/*  lineas de codigo que permite subir los datos y la imganes a la base de datos 
   if($subirarchivo){
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