<?php

session_start();
$name_user = $_SESSION['name_user'];
$lastname_user = $_SESSION['lastname_user'];


if (!isset($_SESSION['logueado']) || !$_SESSION['logueado']) {
  header("Location: ../guest/login.php");
}

include("../../connect/conectar.php");

$conet = new Conexion();
$c = $conet->conectando();

$query = "SELECT * FROM property LIMIT 3";
$result = mysqli_query($c, $query); 

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Arriendum</title>
    <link rel="stylesheet" href="../../config/css/estilos.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="../../config/css/productos.css"/>
    <link rel="stylesheet" href="../../config/a/css/all.css">
     <link rel="stylesheet" href="../../config/icomoon/style.css">
</head>
<script>
    let baslik = document.title;
     window.onblur = () =>
     document.title = "por favor regresa :(";
     window.onfocus = () =>
     document.title = baslik
</script>
<body>
<header>

<nav>
    <img class="logo" src="../../assets/icons/logo.png">
    <ul>
        <li><button class="ba" type="button"><a href="product.php">INMUEBLES</a></button></li>
        <li><button class="ba" type="button"><a href="../../view/user/profile.php?id_user=<?php echo $_SESSION['id_user']; ?>"> MI PERFIL </a></button></li>
        <li><button class="bb" type="button"><a href="../../view/user/pub-inm.php">PUBLICA TU INMUEBLE</a></button></li>
        <li><a onclick="cerrar_sesion()" class="btn-exit-system"><i class="fas fa-power-off"></i></a></li>
    </ul>
</nav>

<section class="textos-header">
    <h1>BIENVENIDO</h1>
    <h2><?php echo $name_user, " ", $lastname_user; ?></h2>
</section>

<div class="wave" style="height: 200px; overflow: hidden;">
    <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
        <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;">
        </path>
    </svg>
</div>

</header>

<main>

<section class="nosotros">
    <section class="contenedor sobre-nosotros">

        <h2 class="titulo">Inmuebles Destacados</h2>

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">

                <div class="carousel-item active">
                <img class="d-block w-100" src="../../assets/img/img/casa1.jpg" alt="First slide">
                </div>

                <div class="carousel-item">
                <img class="d-block w-100" src="../../assets/img/img/casa2.jpg" alt="Second slide">
                </div>

                <div class="carousel-item">
                <img class="d-block w-100" src="../../assets/img/img/casa3.jpg" alt="Third slide">
                </div>
                
            </div>

            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>

    </section>
</section>


<section class="clients">
    <section class="clientes contenedor">
    <h2 class="titulo">Que dicen nuestros clientes</h2>
    <div class="cards">
        <div class="card">
            <img src="../../assets/img/img/hombre perfil - copia.jpg" alt="">
            <div class="contenido-texto-card">
                <h4>Jersson</h4>
                <p>plataform is super easy to use and is getting better and more versatile all the time !</p>
            </div>
        </div>
        <div class="card">
            <img src="../../assets/img/img/mujer perfil - copia.jpg" alt="">
            <div class="contenido-texto-card">
                <h4> gabriela </h4>
                <p>plataform is super easy to use and is getting better and more versatile all the time!</p>
            </div>
        </div>
    </div>
    </section>
</section>

<section class="about-services">
    <div class="contenedor">
        <h2 class="titulo">Puedes Encontrar Tu Lugar en:</h2>
        <div class="servicio-cont">
            <div class="servicio-ind" >
                <img  src="../../assets/img/img/ciudadbolivar.jpg" alt="" >
                <br>
                <br>
              <h4>Ciudad Bolivar</h4></a>  
            
            </div>
            <div class="servicio-ind">
                <img src="../../assets/img/img/kennedy.jpg" alt="">
                <br>
                <br>
                <h4>Kennedy</h4></a>                    
            </div>
            <div class="servicio-ind">
                <img src="../../assets/img/img/bosa.jpg" alt="">
                <br>
                <br>
               <h4>BOSA</h4></a>  
             
            </div>
        </div>
    </div>
</section>

</main>

    <footer>  
        <div class="contenedor-footer">
        <div class="content-foo">
                    <h4>Phone</h4>
                    <p>3203635362</p>
                </div>
                <div class="content-foo">
                    <h4>Email</h4>
                    <p>arriendum@gmail.com</p>
                </div>
                <div class="content-foo">
                    <h4>¿Que es Arriendum?</h4>
                    <p>Arriendum es un aplicativo que permite<br>a las personas realizar la publicacion de sus Inmuebles</p>
                </div>
                <div class="content-foo">
                    <img class="logo" src="../../assets/icons/logo.png">
                </div>
            </div> 
    <div class="social">
		<ul>
			<li><a href="https://www.facebook.com/profile.php?id=100090515414959&mibextid=ZbWKwL" target="_blank" class="icon-facebook"></a></li>
			<li><a href="https://twitter.com/arriendum" target="_blank" class="icon-twitter"></a></li>
			<li><a href="https://www.instagram.com/arriendum/" target="_blank" class="icon-instagram"></a></li>
			<li><a href="mailto:arriendum@gmail.com" class="icon-mail"></a></li>
            <li><a href="https://github.com/Sebastian-Guerrero/arriendum.git" target="_blank"class="icon-github"></a></li>
		</ul>
	</div>
        <h2 class="titulo-final">&copy; Arriendum </h2>
    </footer>
    <script src="../../config/js/alert.js"></script>
    <script src="../../config/js/java.js"></script>
    <script src="../../config/js/jquery.min.js"></script>
    <script src="../../config/js/popper.min.js"></script>
    <script src="../../config/js/bootstrap.min.js"></script>
</body>

</html>