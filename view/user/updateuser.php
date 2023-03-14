<?php
include("../../connect/conectar.php");
include("../../controller/user/userController.php");

session_start();
$id_user = $_SESSION ['id_user'];
$name_user = $_SESSION['name_user'];
$lastname_user = $_SESSION['lastname_user'];


if (!isset($_SESSION['logueado']) || !$_SESSION['logueado']) {
  header("Location: ../guest/login.php");
}


date_default_timezone_set('America/Bogota');
$fecha = Date('Y-m-d H:i:s');

$conet = new Conexion();
$c = $conet->conectando();


$query="SELECT * FROM user WHERE id_user = '$id_user'";
$resultado = mysqli_query($c, $query);
$arreglo = mysqli_fetch_array($resultado);

$query1="SELECT * FROM rol_user";
$resultado1 = mysqli_query($c, $query1);
$arreglo1 = mysqli_fetch_array($resultado1); 

$query3="SELECT * FROM type_document";
$resultado3 = mysqli_query($c, $query3);
$arreglo3 = mysqli_fetch_array($resultado3); 

$query5="SELECT * FROM state_user";
$resultado5 = mysqli_query($c, $query5);
$arreglo5 = mysqli_fetch_array($resultado5); 


$obj->id_user = $arreglo[0];
$obj->state_user = $arreglo[1];
$obj->rol_user = $arreglo[2];
$obj->type_document = $arreglo[3];
$obj->name_user = $arreglo[4];
$obj->lastname_user = $arreglo[5];
$obj->phone_user = $arreglo[6];
$obj->email_user = $arreglo[7];
$obj->password_user = $arreglo[8];
$obj->create_user = $arreglo[9];
$obj->update_user = $arreglo[10];


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
  
        <nav>
            <img class="logo" src="../../assets/icons/logo.png">
            <ul>
                <li><button class="ba" type="button"><a href="index-user.php">INICIO</a></button></li>
                <li><button class="ba" type="button"><a href="product.php">INMUEBLES</a></button></li>
                <li><button class="bb" type="button"><a href="pub-inm.php">PUBLICAR INMUEBLE</a></button></li>
                <li><a onclick="cerrar_sesion()" class="btn-exit-system"><i class="fas fa-power-off"></i></a></li>
            </ul>
        </nav>




<div class="login-page">
            

<div class="form">

        <form class="card-body" action="" method="POST">
            <p class="name"> Mi Informacion:
            <br>
            <?php echo $obj->id_user ?> </p>
        
            <hr>
                <td>

                </td>    
                <input type="hidden" name="id_user" id="id_user" value="<?php  echo $obj->id_user  ?>" readonly />                                             
                <input type="hidden" name="state_user" id="state_user" value="<?php  echo $obj->state_user  ?>" readonly />
                <input type="hidden" name="rol_user" id="rol_user" value="<?php  echo $obj->rol_user  ?>" readonly />
                <div class="col-12 col-md-6">
										<select   class="form-control" name="type_document" id="type_document" required>
											<?php
												 	$conet = new Conexion();
													 $c = $conet->conectando();
													 $query4="SELECT * FROM type_document WHERE id_type_document = '$obj->type_document'";
													 $resultado4 = mysqli_query($c, $query4);
													 $arreglo4 = mysqli_fetch_row($resultado4);	
                                                     ?><option value="<?php echo $arreglo[3]; ?>"><?php echo $arreglo4[1]; ?></option> <?php	 
													do{
														$id = $arreglo3['id_type_document'];
														$nombre=$arreglo3['name_type_document'];
														if($id==$obj->type_document){
															echo "<option value=$id=>$nombre";
														}else{
															echo "<option value=$id>$nombre";
														}
													}while($arreglo3 = mysqli_fetch_array($resultado3));			 	
													$row = mysqli_num_rows($resultado3);
													$rows=0;
													if($rows>0){
														mysqli_data_seek($resultado3, 0);
														$arreglo3 = mysqli_fetch_array($resultado3);
													}
												
												 ?>
										</select>
                <input type="text" placeholder="Nombre" autocomplete="off" name="name_user"  id="name_user"  value="<?php  echo $obj->name_user  ?>" required/>
                <input type="text" placeholder="Apellido" autocomplete="off" name="lastname_user" id="lastname_user" value="<?php  echo $obj->lastname_user  ?>" required/>
                <input type="number" placeholder="Celular"  autocomplete="off" name="phone_user" id="phone_user" value="<?php  echo $obj->phone_user  ?>" required />
                <input type="email" placeholder="Correo Electronico" autocomplete="off" name="email_user" id="email_user" value="<?php  echo $obj->email_user  ?>" required  />
                <input type="hidden" placeholder="Contraseña" autocomplete="off" name="password_user" id="password_user" />
                <input type="hidden" placeholder="verify_password" autocomplete="off" name="verify_password" id="verify_password"  />
                <input type="hidden" name="create_user">
                <input type="hidden" name="update_user" value="<?php echo $fecha;?>">
                <button type="submit" name="modifica_usuario">Actualizar</button>
                <br>
                <br>
                <a href="MisInmuebles.php">
                    <button type="button">Mis inmuebles</button>
                </a>
                
        </form>
    </div>
</div>
    
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="../../config/js/sweetalert2.min.js" ></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
    <script src="../../config/js/alert.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>