<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/estilos.css">   
    <title>Kaos Componentes</title>
    

</head>
<body>
<header>
<!--Dentro de este header se crea el menu de opciones de la pagina-->
        <div>
            <nav class="lineal">
                <div>
                    <a href="Catalogo.php"><img src="assets/images/logo.jpg" alt=""></a>
                </div>
                <ul class="menu">
                    <li><a href="Catalogo.php">Inicio</a></li>
                    <li><a href="https://partes.speedlogic.com.co/?_gl=1*lxsj60*_ga*MzIzMjI0OTAwLjE2Mzc4NzQzODE.*_ga_CYCVDH01ZR*MTY0NjI2OTIwOC40LjAuMTY0NjI2OTIwOC4w&_ga=2.169908256.1297060025.1646269212-323224900.1637874381"
                            target="_blank" rel="nofollow">Lista
                            de Partes</a></li>
                    <li><a href="Contacts.html">Contactenos</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div><center><h2>Catalogo de Productos</h2></center></div>
    <br><br><br>
    <div class="container">
 <!--Se realiza la conexión con la base de datos para traer las imagenes que hacen parte del catalogo-->       
    <?php 
        include("conexion/conexiones.php");
                $query = "SELECT * FROM catalogo";
                $resultado = $conexion->query($query);
                while ($row = $resultado->fetch_assoc()){
                    ?>
                    <div class="card">
                        <img src="data:imge/jpg;base64, <?php echo base64_encode($row['imagen']);?>" alt="">
                        <h4><?php echo $row['nombre']; ?></h4>
                        <h3><?php echo $row['precio'],$row['moneda'];?></h3>
                        <a href="#">Comprar</a>
                    </div> 
                    <?php
                }

        ?>

    </div>

    
</body>
</html>