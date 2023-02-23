<?php

include("../../connect/conectar.php");
include("../../controller/user/userController.php");

$obj = new User();
if($_POST)
{

  $obj->id_user = $_POST['id_user'];
  $obj->state_user = $_POST['state_user'];
  $obj->rol_user = $_POST['rol_user'];
  $obj->type_document = $_POST['type_document'];
  $obj->name_user = $_POST['name_user'];
  $obj->lastname_user = $_POST['lastname_user'];
  $obj->phone_user = $_POST['phone_user'];
  $obj->email_user = $_POST['email_user'];
  $obj->password_user = $_POST['password_user'];
  $obj->verify_password = $_POST['verify_password'];
  $obj->create_user = $_POST['create_user'];
  $obj->update_user = $_POST['update_user'];
  
}

$conet = new Conexion();
$c = $conet->conectando();

$query ="SELECT * FROM type_document";
$result = mysqli_query($c, $query);
$fila = mysqli_fetch_array($result);

date_default_timezone_set('America/Bogota');
$fecha = Date('Y-m-d H:i:s');

?>
<!doctype html>
<html lang="es">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="../../config/css/estilosregister.css">

    <title>Registro</title>

  </head>

  <body>

    <nav>
      <img class="logo" src="../../assets/icons/logo.png">
        <ul>
          <li><button class="ba" type="button"><a href="../../index.php">INICIO</a></button></li>
          <li><button class="ba" type="button"><a href="product.php">INMUEBLES</button></li>
          <li><button class="ba" type="button"><a href="login.php">INGRESA</a></button></li>
        </ul>
    </nav>

  <div class="login-page">

    <div class="form">

      <form class="register-form" action="" autocomplete="off" method="POST">
        <p class="name">Registro</p>
        <hr>
        <div class="select">
          <select name="type_document" required>
          <option value="1" selected disabled>Selecciona Tipo de Documento:
            <?php
                do {
                  $id = $fila['id_type_document'];
                  $name = $fila['name_type_document'];

                  if ($id==0) {
                    echo "<option>No hay registros</option>";
                  }else {
                    echo "<option value=$id>$name</option>";
                  }

                }while($fila = mysqli_fetch_array($result));			 	
                    $row = mysqli_num_rows($result);
                    $rows = 0;
                  if($rows>0){
                    mysqli_data_seek($result, 0);
                    $fila = mysqli_fetch_array($result);
                }
              ?>
              </option>
          </select>
        </div>
        <input type="hidden" name="rol_user" value="2">
        <input type="hidden" name="state_user" value="1">
        <br>                                                     
        <input type="number" placeholder="Numero Identificacion:" name="id_user" required/>                                      
        <input type="text" placeholder="Nombre:" name="name_user" required/>
        <input type="text" placeholder="Apellido:" name="lastname_user" required/>
        <input type="number" placeholder="Celular:" name="phone_user" required/>
        <input type="email" placeholder="Email:" name="email_user" required/>
        <input type="password" placeholder="Contraseña:" name="password_user" required/>
        <input type="password" placeholder="Verifica tu Contraseña:" name="verify_password" required/>
        <input type="hidden" name="create_user" value="<?php echo $fecha;?>">
        <input type="hidden" name="update_user" value="<?php echo $fecha;?>">
        <button type="submit" name="guarda">Crear</button>
      </form>

    </div>

  </div>

<script src="../../config/js/java.js"></script>

  </body>
</html>