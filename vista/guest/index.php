<?php
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="../../config/css/productos.css"/>
</head>

<body>
    <header>
      <img class="logo" src="../../assets/img/img/logo.png">
    
              <nav>
                    <button><a href="../../index.php" type="button" class="btn btn-light">inicio</a></button>
                    <button><a href="../../vistas/user/product.php"button type="button" class="btn btn-light">Inmuebles</a></button>
                    <button><a href="../../vistas/login.php" type="button" class="btn btn-light">login</a></button>
                    <button><a href="vistas/user/singin.php" type="button" class="btn btn-light">registro</a></button>
                    <button><a href="vistas/index-admin.php" type="button" class="btn btn-light"> Administrador </a></button>  
                </nav>
                
                </div>
            </div>

        <section class="textos-header">
            <h1>VENTA Y ARRIENDO</h1>
            <h2>Realiza la publicacion de tu inmueble o propiedad</h2>
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
              <img src="../../assets/img/casa1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../../assets/img/casa 2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../../assets/img/casa 3.jpg" class="d-block w-100" alt="...">
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
            $img = $fila['id_inm'];
            $estado = $fila['estado_inm'];
            $tipo = $fila['tipo_inm'];
            $opcion = $fila['opcion_inm'];
            $localidad = $fila['localidad_inm'];
        ?>
            
            <div class="card">

                <?php

                $query5 = "SELECT nom_galeria FROM galeria WHERE id_inm = $img";
                $result5 = mysqli_query($c, $query5);
                $fila5 = mysqli_fetch_array($result5); 

                ?>
                
                <img src="<?php echo $fila5['nom_galeria']; ?>">

                <?php
                
                $query1 = "SELECT nom_estado_inm FROM estado_inmueble WHERE id_estado_inm = $estado";
                $result1 = mysqli_query($c, $query1);
                $fila1 = mysqli_fetch_array($result1);

                ?>

                <h4><?php echo $fila1['nom_estado_inm']; ?></h4>

                <br>

                <?php

                $query2 = "SELECT nom_tipo_inm FROM tipo_inmueble WHERE id_tipo_inm = $tipo";
                $result2 = mysqli_query($c, $query2);
                $fila2 = mysqli_fetch_array($result2);

                ?>

                <p>Tipo: <?php echo $fila2['nom_tipo_inm']; ?></p>

                <?php

                $query3 = "SELECT nom_opcion_inm FROM opcion_inmueble WHERE id_opcion_inm = $opcion";
                $result3 = mysqli_query($c, $query3);
                $fila3 = mysqli_fetch_array($result3);

                ?>

                <p>Inmueble para: <?php echo $fila3['nom_opcion_inm']; ?></p>

                <?php

                $query4 = "SELECT nom_localidad_inm FROM localidad_inmueble WHERE id_localidad_inm = $localidad";
                $result4 = mysqli_query($c, $query4);
                $fila4 = mysqli_fetch_array($result4);
                
                ?>

                <p>Localidad: <?php echo $fila4['nom_localidad_inm']; ?></p>

                <p>Barrio: <?php echo $fila['barrio_inm']; ?></p>

                <p>Dirreccion: <?php echo $fila['direccion_inm']; ?></p>

                <p>Precio: <?php echo $fila['precio_inm']; ?></p>

<br>

                <a href="#">Mas Informacion...</a>

            </div>
            
        <?php
        }
        ?>

        </div>
        <section class="clients">
            <section class="clientes contenedor">
            <h2 class="titulo">Que dicen nuestros clientes</h2>
            <div class="cards">
                <div class="card">
                    <img src="../../assets/img/hombre perfil.jpg" alt="">
                    <div class="contenido-texto-card">
                        <h4>Jersson</h4>
                        <p>plataform is super easy to use and is getting better and more versatile all the time !</p>
                    </div>
                </div>
                <div class="card">
                    <img src="../../assets/img/mujer perfil.jpg" alt="">
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
                        <img  src="../../assets/img/ciudadbolivar.jpg" alt="" >
                        <br>
                        <br>
                        <a href="vistas/productos1.php" type="button" class="btn btn-outline-secondary"><h4>Ciudad Bolivar</h4></a>  
                    
                    </div>
                    <div class="servicio-ind">
                        <img src="../../assets/img/kennedy.jpg" alt="">
                        <br>
                        <br>
                        <a href="../../vistas/productos1.php" type="button" class="btn btn-outline-secondary"><h4>Kennedy</h4></a>                    
                    </div>
                    <div class="servicio-ind">
                        <img src="../../assets/img/bosa.jpg" alt="">
                        <br>
                        <br>
                        <a href="../../vistas/productos1.php" type="button" class="btn btn-outline-secondary"><h4>BOSA</h4></a>  
                     
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
        <h2 class="titulo-final">&copy; Arriendum </h2>
    </footer>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>

