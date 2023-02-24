<?php
include("../../connect/conectar.php");


session_start();
$id_user = $_SESSION ['id_user'];
$name_user = $_SESSION['name_user'];
$lastname_user = $_SESSION['lastname_user'];


if (!isset($_SESSION['logueado']) || !$_SESSION['logueado']) {
  header("Location: ../guest/login.php");
}

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
            <h1><?php echo "$name_user";?><h1>
            <ul>
                <li><button class="ba" type="button"><a href="index-user.php">INICIO</a></button></li>
                <li><button class="ba" type="button"><a href="product.php">INMUEBLES</a></button></li>
                <li><button class="bb" type="button"><a href="pub-inm.php">PUBLICAR INMUEBLE</a></button></li>
                <li><a onclick="cerrar_sesion()" class="btn-exit-system"><i class="fas fa-power-off"></i></a></li>
            </ul>
        </nav>
        <div class="login-page">

<div class="form" style="margin-top: 50px;">

        <form class="card-body" action="../../connect/validate2.php" method="POST">
            <p class="name"> Mi  perfil
            <br>
            <p>Ingrese por favor su contraseña, para poder actualizar sus datos:</p>
            <br>
            <hr>
            <div>
                </div>                                              
                <div class="col-12 col-md-6">
                <input type="password" placeholder="Contraseña:" autocomplete="off" name="password_user" id="password" />
                <div>
                    <input class="contra" style="margin-left:-254px" type="checkbox" onclick="verpassword()">
                    <p class="contra">Mostrar Contraseña</p>
                <div>
                <br>
                <button type="submit">Ingresar</button>
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
    <script src="../../config/js/alert.js"></script>
    <script src="../../config/js/sweetalert2.min.js" ></script>
    <script src="../../config/js/sweetalert2.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
    <script src="../../config/js/main.js" ></script>
    <script>
      function verpassword(){
          var tipo = document.getElementById("password");
          if(tipo.type == "password")
        {
            tipo.type = "text";
          }
        else
        {
            tipo.type = "password";
          }
      }
  </script>
</body>

</html>
