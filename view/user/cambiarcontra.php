<?php
include("../../connect/conectar.php");


session_start();
$id_user = $_SESSION ['id_user'];
$name_user = $_SESSION['name_user'];
$lastname_user = $_SESSION['lastname_user'];




date_default_timezone_set('America/Bogota');
$fecha = Date('Y-m-d H:i:s');

$id_user=$_GET['id_user'];
$conet = new Conexion();
$c = $conet->conectando();



if($_SESSION['id_user'] != $id_user) {
    echo "<script> alert('Usted esta intentando entrar a otra cuenta');window.location= '../../index.php' </script>";
    session_destroy();
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
    <link rel="stylesheet" href="../../config/css/estilosperfil.css">
    
    
    <title>Arriendum</title>

</head>

<body>
    <header>
        <nav>
            <img class="logo" src="../../assets/icons/logo.png">
            <h1><?php echo "$name_user $lastname_user";?><h1>
            <ul>
                <li><button class="ba" type="button"><a href="index-user.php">INICIO</a></button></li>
                <li><button class="ba" type="button"><a href="product.php">INMUEBLES</a></button></li>
                <li><button class="bb" type="button"><a href="pub-inm.php">PUBLICAR INMUEBLE</a></button></li>
                <li><a href="../../connect/logout.php" class="btn-exit-system"><i class="fas fa-power-off"></i></a></li>
            </ul>
        </nav>
        <div class="form" style="margin-top: 160px;">

<form class="card-body" action="change.php" method="POST">
    <p class="name"> Cambiar contraseña </p>
    <hr>
    <div>
        </div>
        <td>
        </td>    
        <div class="col-12 col-md-6">
        <input type="password" placeholder="Actual contraseña" autocomplete="off" name="password_user"   />
        <input type="password" placeholder="Nueva Contraseña" autocomplete="off" name="new_password"  />
        <input type="password" placeholder="Verifica tu nueva contraseña" autocomplete="off" name="verify_password"  />
        <input type="hidden" name="update_user" value="<?php echo $fecha;?>">
        <button type="submit">Modificar Contraseña</button>
        <br>
        <br>
</form>
</div>
</div>
    </header>
    <footer style="margin-top:390px">  
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>Phone</h4>
                <p>8296312</p>
            </div>
            <div class="content-foo">
                <h4>Email</h4>
                <p>arriendum@gmail.com</p>
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