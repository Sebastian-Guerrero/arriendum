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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="../../config/css/productos.css"/>
    <link rel="stylesheet" href="../../config/a/css/all.css">
     <link rel="stylesheet" href="../../config/icomoon/style.css">
</head>

<body>
    <header>
    <nav>
      <img class="logo" src="../../assets/icons/logo.png">
      <ul>
            <li><button class="ba" type="button"><a href="index-user.php">INICIO</a></button></li>
            <li><button class="ba" type="button"><a href="product.php">INMUEBLES</a></button></li>
            <li><button class="ba" type="button"><a href="../../view/user/profile.php?id_user=<?php echo $_SESSION['id_user']; ?>"> MI PERFIL </a></button></li>
            <li><a onclick="cerrar_sesion()" class="btn-exit-system"><i class="fas fa-power-off"></i></a></li>
        </ul>
    </nav>
              

        <section class="textos-header">
            <h1>BIENVENIDO</h1>
            <h2><?php echo $name_user," ", $lastname_user;?></h2>
        </section>
        <div class="wave" style="height: 200px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #fff;"></path>
            </svg></div>
    </header>
    <main>
        <section class="nosotros">
            <section class="contenedor sobre-nosotros">
            <h2 class="titulo">Inmuebles Destacados</h2>
            <div class="carousel">
            <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../../assets/img/img/casa1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../../assets/img/img/casa2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../../assets/img/img/casa3.jpg" class="d-block w-100" alt="...">
              </div>
              </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
            </section>
        </section>
        <h2 class="titulo">Inmuebles para el publico</h2>
        <div class="productos">
        <?php
        
        while ($fila = mysqli_fetch_array($result)) {
            $img = $fila['id_property'];
            $estado = $fila['state_property'];
            $tipo = $fila['type_property'];
            $opcion = $fila['option_property'];
            $localidad = $fila['location_property'];
        ?>
            
            <div class="card">

                <?php

                $query5 = "SELECT name_galery_property FROM galery_property WHERE id_property = $img";
                $result5 = mysqli_query($c, $query5);
                $fila5 = mysqli_fetch_array($result5); 

                ?>
                
                <img src="<?php echo $fila5['name_galery_property']; ?>">

                <?php
                
                $query1 = "SELECT name_state_property FROM state_property WHERE id_state_property = $estado";
                $result1 = mysqli_query($c, $query1);
                $fila1 = mysqli_fetch_array($result1);

                ?>

                <h4><?php echo $fila1['name_state_property']; ?></h4>

                <br>

                <?php

                $query2 = "SELECT name_type_property FROM type_property WHERE id_type_property= $tipo";
                $result2 = mysqli_query($c, $query2);
                $fila2 = mysqli_fetch_array($result2);

                ?>

                <p>Tipo: <?php echo $fila2['name_type_property']; ?></p>

                <?php

                $query3 = "SELECT name_option_property FROM option_property WHERE id_option_property= $opcion";
                $result3 = mysqli_query($c, $query3);
                $fila3 = mysqli_fetch_array($result3);

                ?>

                <p>Inmueble para: <?php echo $fila3['name_option_property']; ?></p>

                <?php

                $query4 = "SELECT name_location_property FROM location_property WHERE id_location_property= $localidad";
                $result4 = mysqli_query($c, $query4);
                $fila4 = mysqli_fetch_array($result4);
                
                ?>

                <p>Localidad: <?php echo $fila4['name_location_property']; ?></p>

                <p>Barrio: <?php echo $fila['neighborhood_property']; ?></p>

                <p>Dirreccion: <?php echo $fila['direction_property']; ?></p>

                <p>Precio: <?php echo $fila['cost_property']; ?></p>

<br>

                <a href="#">Mas Informacion...</a>

            </div>
            
        <?php
        }
        ?>

        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
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
                        <a href="product.php" type="button" class="btn btn-outline-secondary"><h4>Ciudad Bolivar</h4></a>  
                    
                    </div>
                    <div class="servicio-ind">
                        <img src="../../assets/img/img/kennedy.jpg" alt="">
                        <br>
                        <br>
                        <a href="product.php" type="button" class="btn btn-outline-secondary"><h4>Kennedy</h4></a>                    
                    </div>
                    <div class="servicio-ind">
                        <img src="../../assets/img/img/bosa.jpg" alt="">
                        <br>
                        <br>
                        <a href="product.php" type="button" class="btn btn-outline-secondary"><h4>BOSA</h4></a>  
                     
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
                <h4>Location</h4>
                <p>Bogota D.C </p>
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
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="../../config/js/alert.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>