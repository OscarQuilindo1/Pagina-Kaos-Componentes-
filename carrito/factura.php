<?php  session_start();
include("../conexion/conexiones.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="../Alert/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="../Alert/sweetalert.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- ESTILO CURSOS DE PROGRAMACION -->
    <link rel="stylesheet" href="../css/style_cp.css">
    <link rel="stylesheet" href="../assets/estilos.css">

<title>Consulta basica</title>
</head>
<body>

<header>
<!--Dentro de este header se crea el menu de opciones de la pagina-->
        <div>
            <nav class="lineal">
                <div>
                    <a href="../Catalogo.php"><img src="../assets/images/logo.jpg" alt=""></a>
                </div>
                <ul class="menu">
                    <li><a href="../Catalogo.php">Inicio</a></li>
                    <li><a href="https://partes.speedlogic.com.co/?_gl=1*lxsj60*_ga*MzIzMjI0OTAwLjE2Mzc4NzQzODE.*_ga_CYCVDH01ZR*MTY0NjI2OTIwOC40LjAuMTY0NjI2OTIwOC4w&_ga=2.169908256.1297060025.1646269212-323224900.1637874381"
                            target="_blank" rel="nofollow">Lista
                            de Partes</a></li>
                    <li><a href="../Contacts.html">Contactenos</a></li>
                    <?php include("../nav_cart.php");
                          include("../modal_cart.php")
                     ?>
                </ul>
            </nav>
        </div>
    </header>


<style>
.container_card{    margin: 0 auto;    padding:  0px 20px 20px 20px;    display: grid;    /* width: 800px; */    grid-template-columns: 1fr 1fr ;   grid-gap:1em;        /* grid-row-gap: 60px; */}
.blog-post{    position: relative;    margin-bottom: 15px;    margin: 30px;}
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



<!-- vista B -->
<div class="center mt-5">
        <div class="card pt-3" >
                <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Mis pedidos</p>
                <div class="container-fluid p-2">
                        <table class="table">
                                <thead>
                                        <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Apellido</th>
                                                <th scope="col">Localidad</th>
                                                <th scope="col">Telefono</th>
                                        </tr>
                                </thead>
                                <tbody>

                                <?php
require_once ("mongo.php");

if($collection->count()>0){
    $row = $collection->find();
    foreach($row as $nameUsuario){
    

?>                              <td  style="vertical-align: middle;"><?php echo $nameUsuario["_id"]?></td>
                                <td  style="vertical-align: middle;"><?php echo $nameUsuario["nombre"] ?></td>
                                <td  style="vertical-align: middle;"><?php echo $nameUsuario["apellido"] ?></td>
                                <td  style="vertical-align: middle;"><?php echo $nameUsuario["localidad"] ?></td>
                                <td  style="vertical-align: middle;"><?php echo $nameUsuario["telefono"] ?></td>

 <?php }
}?>
                                        </div>
                                </tbody>
                        </table>
                </div>
        </div>
</div>



<!-- datos cliente -->
<div class="container p-5">
<form class="row g-3 needs-validation" action="paga.php" method="POST" novalidate>

<p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Datos de Pago</p>

<input type="hidden" name="dato" value="insertar" >
  <div class="col-md-6">
    <label for="validationCustom01" class="form-label">Nombre del titular</label>
    <input type="text" class="form-control" id="validationCustom01" name="nombre" value=""  required>
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su nombre.
      </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Numero de tarjeta</label>
    <input type="text" class="form-control" id="validationCustom02" name="numero" value=""  required>
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte el numero de tarjeta.
      </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">cvv</label>
    <input type="text" class="form-control" id="validationCustom03" name="cvv" value=""  required>
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su cvv.
      </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom04" class="form-label">Fecha</label>
    <input type="text" class="form-control" id="validationCustom04" name="fecha" value=""  required>
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte la fecha de vencimiento.
      </div>
  </div>
  <button  class="btn btn-success mb-4" type="submit">Finalizar</button>

</form>

</div>

<!-- END vista B -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>

</body>
</html>








