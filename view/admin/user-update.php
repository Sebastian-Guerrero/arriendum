<?php
include("../../connect/conectar.php");
include("../../controller/admin/userController.php");

session_start();
$name_user = $_SESSION['name_user'];
$lastname_user = $_SESSION['lastname_user'];

if (!isset($_SESSION['logueado']) || !$_SESSION['logueado']) {
	header("Location: ../guest/login.php");
}

$obj = new User();
if($_POST){

    $obj->id_user = $_POST['id_user'];
    $obj->state_user = $_POST['state_user'];
    $obj->rol_user = $_POST['rol_user'];
    $obj->type_document = $_POST['type_document'];
    $obj->name_user = $_POST['name_user'];
    $obj->lastname_user = $_POST['lastname_user'];
    $obj->phone_user = $_POST['phone_user'];
    $obj->email_user = $_POST['email_user'];
    $obj->password_user = $_POST['password_user'];
    $obj->create_user = $_POST['create_user'];
    $obj->update_user = $_POST['update_user'];

}


date_default_timezone_set('America/Bogota');
$fecha = Date('Y-m-d H:i:s');

$key=$_GET['key'];
$conet = new Conexion();
$c = $conet->conectando();

$query="SELECT * FROM user WHERE id_user = '$key'";
$resultado = mysqli_query($c, $query);
$arreglo = mysqli_fetch_array($resultado); 

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

$query1="SELECT * FROM rol_user";
$resultado1 = mysqli_query($c, $query1);
$arreglo1 = mysqli_fetch_array($resultado1); 

$query3="SELECT * FROM type_document";
$resultado3 = mysqli_query($c, $query3);
$arreglo3 = mysqli_fetch_array($resultado3); 

$query5="SELECT * FROM state_user";
$resultado5 = mysqli_query($c, $query5);
$arreglo5 = mysqli_fetch_array($resultado5); 

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Usuario</title>

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
				<a href="../../index.php">
					<i class="fas fa-pager"></i>
				</a>
				<a href="#" class="btn-exit-system">
					<i class="fas fa-power-off"></i>
				</a>
			</nav>

			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-center">
					<i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR USUARIO
				</h3>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="user-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR USUARIO</a>
					</li>
					<li>
						<a href="user-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA USUARIO</a>
					</li>
					<li>
						<a href="user-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUARIO</a>
					</li>
				</ul>	
			</div>
			
			<!-- Content here-->
			<div class="container-fluid">
				<form class="form-neon" action="" method="POST" autocomplete="off">
					<fieldset>
						<legend class="text-center"><i class="fas fa-user"></i> &nbsp; Actualizar Usuario</legend>

						<div class="container-fluid">
							<div class="row">

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">NUMERO DE IDENTIFICACION:</label>
										<input type="number" class="form-control" name="id_user" id="id_user"  value="<?php echo $obj->id_user; ?>" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<select class="form-control" name="state_user" id="state_user" required>
											<option>
												 <?php
												 	$conet = new Conexion();
													 $c = $conet->conectando();
													 $query6="SELECT * FROM state_user WHERE id_state_user = '$obj->state_user'";
													 $resultado6 = mysqli_query($c, $query6);
													 $arreglo6 = mysqli_fetch_row($resultado6); 
													 echo $arreglo5[1];
													do{
														$id = $arreglo5['id_state_user'];
														$nombre=$arreglo5['name_state_user'];
														if($id==$obj->state_user){
															echo "<option value=$id=>$nombre";
														}else{
															echo "<option value=$id>$nombre";
														}

													}while($arreglo5 = mysqli_fetch_array($resultado5));			 	
													$row = mysqli_num_rows($resultado1);
													$rows=0;
													if($rows>0){
														mysqli_data_seek($resultado, 0);
														$arreglo5 = mysqli_fetch_array($resultado5);
													}
												
												 ?>
										
										</option>
											
										</select>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<select class="form-control" name="rol_user" id="rol_user" required>
											<option>
												 <?php
												 	$conet = new Conexion();
													 $c = $conet->conectando();
													 $query2="SELECT * FROM rol_user WHERE id_rol_user = '$obj->rol_user'";
													 $resultado2 = mysqli_query($c, $query2);
													 $arreglo2 = mysqli_fetch_row($resultado2); 
													 echo $arreglo2[1];
													do{
														$id = $arreglo1['id_rol_user'];
														$nombre=$arreglo1['name_rol_user'];
														if($id==$obj->rol_user){
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
										
										</option>
											
										</select>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<select class="form-control" name="type_document" id="type_document" required>
											<?php
												 	$conet = new Conexion();
													 $c = $conet->conectando();
													 $query4="SELECT * FROM type_document WHERE id_type_document = '$obj->type_document'";
													 $resultado4 = mysqli_query($c, $query4);
													 $arreglo4 = mysqli_fetch_row($resultado4);

													?>
													<option value="<?php echo $arreglo[3]; ?>"><?php echo $arreglo4[1]; ?></option>
													<?php

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
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">NOMBRE:</label>
										<input type="text" class="form-control" name="name_user" id="name_user" value ="<?php echo $obj->name_user ?>" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">APELLIDO:</label>
										<input type="text" class="form-control" name="lastname_user" id="lastname_user" value="<?php echo $obj->lastname_user ?>" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">CELULAR:</label>
										<input type="number" class="form-control" name="phone_user" id="phone_user"  value="<?php echo $obj->phone_user ?>" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">EMAIL:</label>
										<input type="email" class="form-control" name="email_user" id="email_user" value="<?php  echo $obj->email_user  ?>" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">CONTRASEÑA:</label>
										<input type="password" class="form-control" name="password_user" id="password_user" required>
									</div>
								</div>

								<input type="hidden" name="create_user" id="create_user">
								<input type="hidden" name="update_user" id="update_user" value="<?php echo $fecha ?>">

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