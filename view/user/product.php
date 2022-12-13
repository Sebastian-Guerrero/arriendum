<?php
include("../../connect/conectar.php");

$conet = new Conexion();
$c = $conet->conectando();

session_start();
$name_user = $_SESSION['name_user'];
$lastname_user = $_SESSION['lastname_user'];


if (!isset($_SESSION['logueado']) || !$_SESSION['logueado']) {
  header("Location: ../guest/login.php");
}

$query = "SELECT * FROM property";
$result = mysqli_query($c, $query); 

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <link rel="stylesheet" href="../../config/css/estilos.css"/>
    <link rel="stylesheet" href="../../config/css/productos.css"/>
    <link rel="stylesheet" href="../../config/a/css/all.css">
    
    <title>Arriendum</title>
  </head>

<body>

        <nav>
            <img class="logo" src="../../assets/icons/logo.png">
            <ul>
                <li><button class="ba" type="button"><a href="index-user.php">INICIO</a></button></li>
                <li><button class="bb" type="button"><a href="pub-inm.php">PUBLICAR INMUEBLE</a></button></li>
                <li><a href="profile.php"><i class="fas fa-user-circle"></i></a></li>
                <li><a href="../../connect/logout.php" class="btn-exit-system"><i class="fas fa-power-off"></i></a></li>
            </ul>
        </nav>

    <section class="catalogo">
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

                $query2 = "SELECT name_type_property FROM type_property WHERE id_type_property = $tipo";
                $result2 = mysqli_query($c, $query2);
                $fila2 = mysqli_fetch_array($result2);

                ?>

                <p>Tipo: <?php echo $fila2['name_type_property']; ?></p>

                <?php

                $query3 = "SELECT name_option_property FROM option_property WHERE id_option_property = $opcion";
                $result3 = mysqli_query($c, $query3);
                $fila3 = mysqli_fetch_array($result3);

                ?>

                <p>Inmueble para: <?php echo $fila3['name_option_property']; ?></p>

                <?php

                $query4 = "SELECT name_location_property FROM location_property WHERE id_location_property = $localidad";
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
    </section>

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
    <script src="js/main.js"></script>
</body>

</html>