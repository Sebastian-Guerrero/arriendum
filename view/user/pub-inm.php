<?php
  include("../../connect/conectar.php");
  include("../../controller/user/propertyController.php");

$obj = new Property();
if($_POST)
{

	$obj->id_property = $_POST['id_property'];
  $obj->id_user = $_POST['id_user'];
  $obj->state_property = $_POST['state_property'];
  $obj->direction_property = $_POST['direction_property'];
  $obj->type_property = $_POST['type_property'];
  $obj->option_property = $_POST['option_property'];
  $obj->location_property = $_POST['location_property'];
  $obj->neighborhood_property = $_POST['neighborhood_property'];
  $obj->information_property = $_POST['information_property'];
  $obj->description_property = $_POST['description_property'];
  $obj->cost_property = $_POST['cost_property'];
  $obj->create_property = $_POST['create_property'];
  $obj->update_property = $_POST['update_property'];

}

session_start();
$id_user = $_SESSION['id_user'];
$name_user = $_SESSION['name_user'];
$lastname_user = $_SESSION['lastname_user'];


if (!isset($_SESSION['logueado']) || !$_SESSION['logueado']) {
  header("Location: ../guest/login.php");
}

$conet = new Conexion();
$c = $conet->conectando();

$query ="SELECT * FROM type_property";
$result = mysqli_query($c, $query);
$fila = mysqli_fetch_array($result);

$query1 ="SELECT * FROM option_property";
$result1 = mysqli_query($c, $query1);
$fila1 = mysqli_fetch_array($result1);

$query2 ="SELECT * FROM location_property";
$result2 = mysqli_query($c, $query2);
$fila2 = mysqli_fetch_array($result2);

date_default_timezone_set('America/Bogota');
$fecha = Date('Y-m-d H:i:s');
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
        <ul>
            <li><button class="ba" type="button"><a href="index-user.php">INICIO</a></button></li>
            <li><button class="ba" type="button"><a href="product.php">INMUEBLES</a></button></li>
            <li><a href="profile.php"><i class="fas fa-user-circle"></i></a></li>
            <li><a href="../../connect/logout.php" class="btn-exit-system"><i class="fas fa-power-off"></i></a></li>
        </ul>
    </nav>

    <div class="login-page">

    <div class="form">

      <form class="register-form" action="" method="POST">
        <p class="name">Registrar Inmueble</p>
        <hr>

        <input type="hidden" name="id_property" id="id_property">

        <input type="hidden" name="id_user" id="id_user" value="<?php echo $id_user; ?>">

        <input type="hidden" name="state_property" id="state_property" value="1">

        <div class="select">
          <select name="type_property" required="">
            <option selected disabled>TIPO DEL INMUEBLE:</option>
            <?php
                do {
                  $id = $fila['id_type_property'];
                  $name = $fila['name_type_property'];

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
          </select>
        </div>

        <div class="select" >
          <select name="option_property" required>
            <option selected disabled>INMUEBLE DESTINADO A:</option>
            <?php
                do {
                  $id1 = $fila1['id_option_property'];
                  $name1 = $fila1['name_option_property'];

                  if ($id1==0) {
                    echo "<option>No hay registros</option>";
                  }else {
                    echo "<option value=$id1>$name1</option>";
                  }

                }while($fila1 = mysqli_fetch_array($result1));			 	
                    $row1 = mysqli_num_rows($result1);
                    $rows1 = 0;
                  if($rows1>0){
                    mysqli_data_seek($result1, 0);
                    $fila1 = mysqli_fetch_array($result1);
                }
              ?>
          </select>
        </div>

        <div class="select">
          <select name="location_property" required="">
            <option selected disabled>SELECIONE LA LOCALIDAD DEL INMUEBLE:</option>
            <?php
                do {
                  $id2 = $fila2['id_location_property'];
                  $name2 = $fila2['name_location_property'];

                  if ($id2==0) {
                    echo "<option>No hay registros</option>";
                  }else {
                    echo "<option value=$id2>$name2</option>";
                  }

                }while($fila2 = mysqli_fetch_array($result2));			 	
                    $row2 = mysqli_num_rows($result2);
                    $rows2 = 0;
                  if($rows2>0){
                    mysqli_data_seek($result2, 0);
                    $fila2 = mysqli_fetch_array($result2);
                }
              ?>
          </select>
        </div>

        <input type="text" placeholder="BARRIO:" name="neighborhood_property" required/>

        <input type="text" placeholder="DIRECCION:" name="direction_property" required/>

        <input type="text" placeholder="INFORMACION TECNICA DEL INMUEBLE:" name="information_property" required/>

        <input type="text" placeholder="DESCRIPCION CARACTERISTICA DEL INMUEBLE:" name="description_property" required/>

        <input type="number" placeholder="PRECIO DEL INMUEBLE:" name="cost_property" required/>

        <input type="hidden" name="create_property" value="<?php echo $fecha;?>">
        <input type="hidden" name="update_property" value="<?php echo $fecha;?>">

        <button type="submit" name="guarda">SIGUIENTE <i class="fas fa-arrow-right"></i></button>
        
      </form>

    </div>

  </div>

<script src="../../config/js/java.js"></script>
</body>
</html>