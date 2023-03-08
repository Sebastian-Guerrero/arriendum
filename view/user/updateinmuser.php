<?php
include("../../connect/conectar.php");
include("../../controller/user/propertycontroller.php");

session_start();
$id_user = $_SESSION ['id_user'];
$name_user = $_SESSION['name_user'];
$lastname_user = $_SESSION['lastname_user'];

if (!isset($_SESSION['logueado']) || !$_SESSION['logueado']) {
	header("Location: ../guest/login.php");
}

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

date_default_timezone_set('America/Bogota');
$fecha = Date('Y-m-d H:i:s');

$key=$_GET['key'];
$conet = new Conexion();
$c = $conet->conectando();

$query="SELECT * FROM property WHERE id_property = '$key'";
$resultado = mysqli_query($c, $query);
$arreglo = mysqli_fetch_array($resultado); 

$obj->id_property = $arreglo[0];
$obj->id_user = $arreglo[1];
$obj->state_property = $arreglo[2];
$obj->direction_property = $arreglo[3];
$obj->type_property = $arreglo[4];
$obj->option_property = $arreglo[5];
$obj->location_property = $arreglo[6];
$obj->neighborhood_property = $arreglo[7];
$obj->information_property = $arreglo[8];
$obj->description_property = $arreglo[9];
$obj->cost_property = $arreglo[10];
$obj->create_property = $arreglo[11];
$obj->update_property =$arreglo[12];

$query1="SELECT * FROM state_property";
$resultado1 = mysqli_query($c, $query1);
$arreglo1 = mysqli_fetch_array($resultado1); 

$query3="SELECT * FROM type_property";
$resultado3 = mysqli_query($c, $query3);
$arreglo3 = mysqli_fetch_array($resultado3); 

$query5="SELECT * FROM option_property";
$resultado5 = mysqli_query($c, $query5);
$arreglo5 = mysqli_fetch_array($resultado5);

$query7="SELECT * FROM location_property";
$resultado7 = mysqli_query($c, $query7);
$arreglo7 = mysqli_fetch_array($resultado7);
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
    <link rel="stylesheet" href="../../config/css/estilosactualizarinmuser.css">
    
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
    </header>

    <div class="login-page">

<div class="form" style="margin-top: -430px;">

        <form class="register-form" action="" method="POST">
            <p class="name"> EDITAR INMUEBLE
            <br>
            <?php echo $obj->id_user ?> </p>
        
            <hr>
            <div>
                </div>
                <br>
                <p class="">ID INMUEBLE:</p>    
                <input type="number" readonly class="form-control" name="id_property" id="id_property" value ="<?php echo $obj->id_property ?>">                                        
                <input type="hidden" readonly class="form-control" name="id_user" id="id_user" value ="<?php echo $obj->id_user ?>">
                <div >
                <p>ESTADO:</p>
									<div  class="select">
										<select  name="state_property" id="state_property" required>
											<?php
												 	$conet = new Conexion();
													$c = $conet->conectando();
													$query2="SELECT * FROM state_property WHERE id_state_property = '$obj->state_property'";
													$resultado2 = mysqli_query($c, $query2);
													$arreglo2 = mysqli_fetch_row($resultado2); 
													?>
														<option value="<?php echo $arreglo[2]; ?>"><?php echo $arreglo2[1]; ?></option>
													<?php
													do{
														$id = $arreglo1['id_state_property'];
														$nombre=$arreglo1['name_state_property'];
														if($id==$obj->state_property){
															echo "<option value=$id=>$nombre";
														}else{
															echo "<option value=$id>$nombre";
														}

													}while($arreglo1 = mysqli_fetch_array($resultado1));			 	
													$row = mysqli_num_rows($resultado1);
													$rows=0;
													if($rows>0){
														mysqli_data_seek($resultado, 0);
														$arreglo1 = mysqli_fetch_array($resultado1);
													}
												
												 ?>
										</select>
									</div>
								</div>
                                <div>
                                    <p>DIRRECION:</p>
									<div class="select">
										<input type="text" class="form-control" name="direction_property" id="direction_property" value ="<?php echo $obj->direction_property ?>" required>
									</div>
								</div>

								<div >
                                    <P>TIPO:</P>
									<div class="select">
										<select class="form-control" name="type_property" id="type_property" required>
											<?php
												 	$conet = new Conexion();
													 $c = $conet->conectando();
													 $query4="SELECT * FROM type_property WHERE id_type_property = '$obj->type_property'";
													 $resultado4 = mysqli_query($c, $query4);
													 $arreglo4 = mysqli_fetch_row($resultado4);

													?>
													<option value="<?php echo $arreglo[4]; ?>"><?php echo $arreglo4[1]; ?></option>
													<?php

													do{
														$id1 = $arreglo3['id_type_property'];
														$nombre1=$arreglo3['name_type_property'];
														if($id1==$obj->type_property){
															echo "<option value=$id1=>$nombre1";
														}else{
															echo "<option value=$id1>$nombre1";
														}

													}while($arreglo3 = mysqli_fetch_array($resultado3));			 	
													$row1 = mysqli_num_rows($resultado3);
													$rows1=0;
													if($rows1>0){
														mysqli_data_seek($resultado, 0);
														$arreglo3 = mysqli_fetch_array($resultado3);
													}
												
												 ?>
										</select>
									</div>
								</div>
                                <div >
                                    <P>OPCION:</P>
									<div class="select">
										<select name="option_property" id="option_property" required>
											<?php
												 	$conet = new Conexion();
													 $c = $conet->conectando();
													 $query6="SELECT * FROM option_property WHERE id_option_property = '$obj->option_property'";
													 $resultado6 = mysqli_query($c, $query6);
													 $arreglo6 = mysqli_fetch_row($resultado6); 
													 ?>
														<option value="<?php echo $arreglo[5]; ?>"><?php echo $arreglo6[1]; ?></option>
													<?php
													do{
														$id2 = $arreglo5['id_option_property'];
														$nombre2=$arreglo5['name_option_property'];
														if($id2==$obj->option_property){
															echo "<option value=$id2=>$nombre2";
														}else{
															echo "<option value=$id2>$nombre2";
														}

													}while($arreglo5 = mysqli_fetch_array($resultado5));			 	
													$row2 = mysqli_num_rows($resultado5);
													$rows2=0;
													if($rows2>0){
														mysqli_data_seek($resultado, 0);
														$arreglo5 = mysqli_fetch_array($resultado5);
													}
												
												 ?>
										</select>
									</div>
								</div>

								<div>
                                    <P>LOCALIDAD</P>
									<div class="select">
										<select  name="location_property" id="location_property" required>
										<?php
												 	$conet = new Conexion();
													 $c = $conet->conectando();
													 $query8="SELECT * FROM location_property WHERE id_location_property = '$obj->location_property'";
													 $resultado8 = mysqli_query($c, $query8);
													 $arreglo8 = mysqli_fetch_row($resultado8); 
													 ?>
														<option value="<?php echo $arreglo[6]; ?>"><?php echo $arreglo8[1]; ?></option>
													<?php
													do{
														$id3 = $arreglo7['id_location_property'];
														$nombre3=$arreglo7['name_location_property'];
														if($id3==$obj->location_property){
															echo "<option value=$id3=>$nombre3";
														}else{
															echo "<option value=$id3>$nombre3";
														}

													}while($arreglo7 = mysqli_fetch_array($resultado7));			 	
													$row2 = mysqli_num_rows($resultado7);
													$rows2=0;
													if($rows2>0){
														mysqli_data_seek($resultado, 0);
														$arreglo7 = mysqli_fetch_array($resultado7);
													}
												
												 ?>
										</select>
									</div>
								</div>

								<div >
									<div class="form-group">
										<label  class="bmd-label-floating">BARRIO:</label>
										<input type="text" class="form-control" name="neighborhood_property" id="neighborhood_property" value ="<?php echo $obj->neighborhood_property ?>" required>
									</div>
								</div>

								<div >
									<div class="form-group">
										<label class="bmd-label-floating">INFORMACION TECNICA:</label>
										<input type="text" class="form-control" name="information_property" id="information_property" value ="<?php echo $obj->information_property ?>" required>
									</div>
								</div>

								<div >
									<div class="form-group">
										<label  class="bmd-label-floating">DESCRIPCION:</label>
										<input type="text" class="form-control" name="description_property" id="description_property" value ="<?php echo $obj->description_property ?>" required>
									</div>
								</div>

								<div >
									<div class="form-group">
										<label class="bmd-label-floating">PRECIO DE LA PROPIEDAD:</label>
										<input type="number" class="form-control" name="cost_property" id="cost_property" value ="<?php echo $obj->cost_property ?>" required>
									</div>
								</div>

								<input type="hidden" name="create_property" id="create_property">

								<input type="hidden" name="update_property" id="update_property" value="<?php echo $fecha ?>">
                            <button type="submit" name="modifica">Actualizar inmueble</button>
                            <br>
                            <br>
                            <a href="MisInmuebles.php">
                                <button type="button">Volver atras</button>
                            </a>
        </form>
    </div>
</div>
</div>
    <footer style="margin-top:100px">  
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
    <script src="../../config/js/sweetalert2.min.js" ></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
    <script src="../../config/js/alert.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>