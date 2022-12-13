<?php
include("../../connect/conectar.php");
include("../../controller/admin/propertyController.php");

session_start();
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
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Inmueble</title>

	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="../../config/css/normalize.css">

	<!-- Bootstrap V4.3 -->
	<link rel="stylesheet" href="../../config/css/bootstrap.min.css">

	<!-- Bootstrap Material Design V4.0 -->
	<link rel="stylesheet" href="../../config/css/bootstrap-material-design.min.css">

	<!-- Font Awesome V5.9.0 -->
	<link rel="stylesheet" href="../../config/a/css/all.css">

	<!-- Sweet Alerts V8.13.0 CSS file -->
	<link rel="stylesheet" href="../../config/css/sweetalert2.min.css">

	<!-- Sweet Alert V8.13.0 JS file-->
	<script src="../../config/js/sweetalert2.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<link rel="stylesheet" href="../../config/css/jquery.mCustomScrollbar.css">

	<!-- General Styles -->
	<link rel="stylesheet" href="../../config/css/style.css">


</head>
<body>
	
	<!-- Main container -->
	<main class="full-box main-container">
		<!-- Nav lateral -->
		<section class="full-box nav-lateral">
			<div class="full-box nav-lateral-bg show-nav-lateral"></div>
			<div class="full-box nav-lateral-content">
				<figure class="full-box nav-lateral-avatar">
					<img src="../../assets/icons/logo.png" class="img-fluid" alt="Logo">
					<figcaption class="roboto-medium text-center">
						<?php echo "$name_user $lastname_user";?>
					</figcaption>
				</figure>
				<div class="full-box nav-lateral-bar"></div>
				<nav class="full-box nav-lateral-menu">
				<ul>
						<li>
							<a href="index-admin.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; INICIO </a>
						</li>

						<br>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-user"></i> &nbsp; USUARIO <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="user-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo Usuario</a>
								</li>
								<li>
									<a href="user-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista Usuario</a>
								</li>
								<li>
									<a href="user-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Usuario</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-user-check"></i> &nbsp; ESTADO USUARIO<i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="sta-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo Estado Usuario</a>
								</li>
								<li>
									<a href="sta-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista Estado Usuario</a>
								</li>
								<li>
									<a href="sta-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Estado Usuario</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-user-tag"></i> &nbsp; ROL USUARIO<i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="rol-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo Rol Usuario</a>
								</li>
								<li>
									<a href="rol-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista Rol Usuario</a>
								</li>
								<li>
									<a href="rol-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Rol Usuario</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-id-card"></i> &nbsp; TIPO DOCUMENTO <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="doc-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo Tipo Documento</a>
								</li>
								<li>
									<a href="doc-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista Tipo Documentos</a>
								</li>
								<li>
									<a href="doc-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Tipo Documento</a>
								</li>
							</ul>
						</li>

						<br>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-house-user"></i> &nbsp; INMUEBLE <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="inm-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Inmueble</a>
								</li>
								<li>
									<a href="inm-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista Inmueble</a>
								</li>
								<li>
									<a href="inm-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Inmueble</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-house-damage"></i> &nbsp; ESTADO INMUEBLE <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="est-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Estado Inmueble</a>
								</li>
								<li>
									<a href="est-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista Estado Inmueble</a>
								</li>
								<li>
									<a href="est-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Estado Inmueble</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-warehouse"></i> &nbsp; TIPO INMUEBLE <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="tipo-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Tipo Inmueble</a>
								</li>
								<li>
									<a href="tipo-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista Tipo Inmueble</a>
								</li>
								<li>
									<a href="tipo-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Tipo Inmueble</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-handshake"></i> &nbsp; OPCION INMUEBLE <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="opc-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Opcion Inmueble</a>
								</li>
								<li>
									<a href="opc-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista Opcion Inmueble</a>
								</li>
								<li>
									<a href="opc-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Opcion Inmueble</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-layer-group"></i> &nbsp; LOCALIDAD INMUEBLE <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="loc-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Localidad Inmueble</a>
								</li>
								<li>
									<a href="loc-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista Localidad Inmueble</a>
								</li>
								<li>
									<a href="loc-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Localidad Inmueble</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-images"></i> &nbsp; GALERIA INMUEBLE <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="gal-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Galeria Inmueble</a>
								</li>
								<li>
									<a href="gal-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista Galeria Inmueble</a>
								</li>
								<li>
									<a href="gal-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Galeria Inmueble</a>
								</li>
							</ul>
						</li>
						
					</ul>
				</nav>
			</div>
		</section>

		<!-- Page content -->
		<section class="full-box page-content">
			<nav class="full-box navbar-info">
				<a href="#" class="float-left show-nav-lateral">
					<i class="fas fa-exchange-alt"></i>
				</a>
				<a href="#" class="btn-exit-system">
					<i class="fas fa-power-off"></i>
				</a>
			</nav>

			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-center">
					<i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR INMUEBLE
				</h3>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="inm-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR INMUEBLE</a>
					</li>
					<li>
						<a href="inm-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA INMUEBLE</a>
					</li>
					<li>
						<a href="inm-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR INMUEBLE</a>
					</li>
				</ul>	
			</div>
			
			<!-- Content here-->
			<div class="container-fluid">
				<form class="form-neon" action="" method="POST" autocomplete="off">
					<fieldset>
						<legend class="text-center"><i class="fas fa-user"></i> &nbsp; Actualizar Inmueble</legend>

						<div class="container-fluid">
							<div class="row">

							<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">ID:</label>
										<input type="number" readonly class="form-control" name="id_property" id="id_property" value ="<?php echo $obj->id_property ?>">
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">USUARIO:</label>
										<input type="number" readonly class="form-control" name="id_user" id="id_user" value ="<?php echo $obj->id_user ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label  class="bmd-label-floating">ESTADO:</label>
										<select class="form-control" name="state_property" id="state_property" required>
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

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">DIRECCION:</label>
										<input type="text" class="form-control" name="direction_property" id="direction_property" value ="<?php echo $obj->direction_property ?>" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label  class="bmd-label-floating">TIPO:</label>
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

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label  class="bmd-label-floating">OPCION:</label>
										<select class="form-control" name="option_property" id="option_property" required>
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

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label  class="bmd-label-floating">LOCALIDAD:</label>
										<select class="form-control" name="location_property" id="location_property" required>
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

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label  class="bmd-label-floating">BARRIO:</label>
										<input type="text" class="form-control" name="neighborhood_property" id="neighborhood_property" value ="<?php echo $obj->neighborhood_property ?>" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">INFORMACION TECNICA:</label>
										<input type="text" class="form-control" name="information_property" id="information_property" value ="<?php echo $obj->information_property ?>" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label  class="bmd-label-floating">DESCRIPCION:</label>
										<input type="text" class="form-control" name="description_property" id="description_property" value ="<?php echo $obj->description_property ?>" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">PRECIO DE LA PROPIEDAD:</label>
										<input type="number" class="form-control" name="cost_property" id="cost_property" value ="<?php echo $obj->cost_property ?>" required>
									</div>
								</div>

								<input type="hidden" name="create_property" id="create_property">

								<input type="hidden" name="update_property" id="update_property" value="<?php echo $fecha ?>">

							</div>
						</div>
					</fieldset>
					<p class="text-center" style="margin-top: 40px;">
						<button type="submit" name="modifica" class="btn btn-raised btn-success btn-sm"><i class="fas fa-sync-alt"></i> &nbsp; ACTUALIZAR</button>
					</p>
				</form>
			</div>
		</section>
	</main>
	
	
	<!--=============================================
	=            Include JavaScript files           =
	==============================================-->
	<!-- jQuery V3.4.1 -->
	<script src="../../config/js/jquery-3.4.1.min.js" ></script>

	<!-- popper -->
	<script src="../../config/js/popper.min.js" ></script>

	<!-- Bootstrap V4.3 -->
	<script src="../../config/js/bootstrap.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<script src="../../config/js/jquery.mCustomScrollbar.concat.min.js" ></script>

	<!-- Bootstrap Material Design V4.0 -->
	<script src="../../config/js/bootstrap-material-design.min.js" ></script>
	<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

	<script src="../../config/js/main.js" ></script>
</body>
</html>