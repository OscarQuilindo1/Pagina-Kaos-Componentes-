<?php session_start();
include("conexion/conexiones.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/estilos.css">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

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
                    <?php include("nav_cart.php");
                          include("modal_cart.php")
                     ?>
                </ul>
            </nav>
        </div>
    </header>
    <!-- vista A -->
<div class="center mt-5">
    <div class="card pt-3" >
            <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Carrito de compra</p>
        <div class="container-fluid p-2" style="background-color: ghostwhite;">

            <?php
            $busqueda=mysqli_query($conexion,"SELECT * FROM catalogo"); 
            $numero = mysqli_num_rows($busqueda); ?>

            <h5 class="card-tittle">Resultados (<?php echo $numero; ?>)</h5>
            <div class="container_card">
              
              <?php while ($resultado = mysqli_fetch_assoc($busqueda)){ 
            
                    ?>

                    <form id="formulario" name="formulario" method="post" action="cart.php">
                        <div class="blog-post ">
                            <img src="data:img/jpg;base64,<?php echo base64_encode($resultado['imagen']); ?>" >
                            <a class="category">
                                <?php echo $resultado["precio"]; ?>€
                            </a>
                                <div class="text-content">                         
                                    <input name="precio" type="hidden" id="precio" value="<?php echo $resultado["precio"]; ?>" />
                                    <input name="nombre" type="hidden" id="nombre" value="<?php echo $resultado["nombre"]; ?>" />
                                    <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                                        <div class="card-body">
                                                <h5 class="card-title"><?php echo $resultado["nombre"]; ?></h5>
                                                <p><?php echo $resultado["nombre"]; ?></p>
                                                <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                                        </div>
                                </div>
                        </div>
                    </form>
                    <?php } ?>
            </div>
        </div>
    </div>
                
</div>
<!-- END vista A -->

<style>
.container_card{    margin: 0 auto;    padding:  0px 20px 20px 20px;    display: grid; /* width: 800px; */    grid-template-columns: 1fr 1fr ;   grid-gap:1em;        /* grid-row-gap: 60px; */}
.blog-post{    position: relative;    margin-bottom: 15px;    margin: 100px;}
.blog-post img{    width: 100%;    height: 450px;    object-fit: cover;    border-radius: 10px;    }
.blog-post .category{    position: absolute;    top: 20px;    left: 20px;    padding: 10px 15px;  font-size: 14px;    text-decoration: none;    background-color: #e67e22;    color: #fff;    border-radius: 5px;    box-shadow: 1px 1px 8px rgba(0,0,0,0.1);    text-transform: uppercase;}
.text-content{    position: absolute;    bottom: -30px;    padding: 20px;    background-color: #fff;    width: calc(100% - 20px);    left: 50%;    transform: translateX(-50%);    border-radius: 10px;    box-shadow: 1px 1px 8px rgba(0,0,0,0.08);/* padding-top: 50px; */}
.text-content h2{    font-size: 20px;    font-weight: 400;    /* margin-bottom: 30px; */}
.text-content img{    height: 70px;    width: 70px;    border: 5px solid rgba(0,0,0,0.1);    border-radius: 50%;    position: absolute;    top: -35px;    left: 35px;}
.tags a{    color: #888;    font-weight: 700;    text-decoration: none;    margin-right: 15px;    transition: 0.3s ease;}
.tags a:hover{    color: #000;}
@media screen and (max-width: 1100px) {    .container_card{        grid-template-columns: 1fr 1fr;        grid-row-gap: 60px;    }}
@media screen and (max-width: 600px) {    .container_card{        grid-template-columns: 1fr;        grid-row-gap: 60px;    }}
</style>

</body>
</html>