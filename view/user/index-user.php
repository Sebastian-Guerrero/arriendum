<?php

session_start();
$name_user = $_SESSION['name_user'];
$lastname_user = $_SESSION['lastname_user'];


if (!isset($_SESSION['logueado']) || !$_SESSION['logueado']) {
  header("Location: ../guest/login.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <link rel="stylesheet" href="../../config/css/estilos.css"/>
    <link rel="stylesheet" href="../../config/a/css/all.css">
    <link rel="stylesheet" href="../../config/css/sweetalert2.min.css">
    
    <title>Arriendum</title>

</head>

<body>

    <header>

        <nav>
            <img class="logo" src="../../assets/icons/logo.png">
            <ul>
                <li><button class="ba" type="button"><a href="product.php">INMUEBLES</a></button></li>
                <li><button class="bb" type="button"><a href="pub-inm.php">PUBLICAR INMUEBLE</a></button></li>
                <li><a href="../../connect/logout.php" class="btn-exit-system"><i class="fas fa-power-off"></i></a></li>
            </ul>
        </nav>

        <section class="textos-header">
            <h1>BIENVENIDO</h1>
            <h2><?php echo "$name_user $lastname_user";?></h2>
        </section>

        <div class="wave" style="height: 150px; overflow: hidden;">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #fff;"></path>
            </svg>
        </div>

    </header>

    <main>

        <section class="nosotros">

        </section>

        <section class="portafolio">

        </section>

        <section class="about-services">
            <div class="contenedor">
                <h2 class="titulo">Puedes Encontrar Tu Lugar en:</h2>
                <div class="servicio-cont">
                    <div class="servicio-ind">
                        <img src="../../assets/img/img/ciudadbolivar.jpg" alt="">
                        <h3>Ciudad Bolivar</h3>
                    
                    </div>
                    <div class="servicio-ind">
                        <img src="../../assets/img/img/kennedy.jpg" alt="">
                        <h3>Kennedy</h3>
                    
                    </div>
                    <div class="servicio-ind">
                        <img src="../../assets/img/img/bosa.jpg" alt="">
                        <h3>Bosa</h3>
                     
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer>  
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>Phone</h4>
                <p>8296312</p>
            </div>
            <div class="content-foo">
                <h4>Email</h4>
                <p>8296312</p>
            </div>
            <div class="content-foo">
                <h4>Location</h4>
                <p>8296312</p>
            </div>
        </div>
        <h2 class="titulo-final">&copy; Arriendum </h2>
    </footer>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="../../config/js/js/main.js"></script>
    <script src="../../config/js/sweetalert2.min.js" ></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
    <script src="../../config/js/main.js" ></script>
</body>

</html>