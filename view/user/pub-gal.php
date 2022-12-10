<?php
  include("../../connect/conectar.php");
  include("../../controller/user/galeryController.php");

$obj = new Galery();
if($_POST)
{
  $obj->id_galery_property = $_POST['id_galery_property'];
  $obj->id_property = $_POST['id_property'];
  $obj->name_galery_property = $_FILES['name_galery_property']['tmp_name'];
}
  
session_start();
$id_user = $_SESSION['id_user'];
$name_user = $_SESSION['name_user'];


if (!isset($_SESSION['logueado']) || !$_SESSION['logueado']) {
  header("Location: ../guest/login.php");
}

$conet = new Conexion();
$c = $conet->conectando();

$query ="SELECT MAX(id_property) FROM property WHERE id_user = '$id_user'";
$result = mysqli_query($c, $query);
$fila = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <link rel="stylesheet" href="../../config/css/public.css"/>
    <link rel="stylesheet" href="../../config/a/css/all.css">
    
    <title>Arriendum</title>

</head>

<body>
    <nav>
        <img class="logo" src="../../assets/icons/logo.png">
        <h1><?php echo "$name_user $lastname_user";?><h1>
        <ul>
    
        </ul>
    </nav>

    <div class="login-page">

    <div class="form">

      <form class="register-form" action="" method="POST" enctype="multipart/form-data">
        <p class="name">Fotos del Inmueble</p>
        <hr>

        <input type="hidden" name="id_galery_property" id="id_galery_property">

        <input type="hidden" name="id_property" id="id_property" value="<?php echo $fila[0];?>">

        <input type="file" name="name_galery_property" id="name_galery_property">
        

        <button type="submit" name="guarda">PUBLICAR</button>
        
      </form>

  
    </div>

  </div>

<script src="../../config/js/java.js"></script>
</body>
</html>