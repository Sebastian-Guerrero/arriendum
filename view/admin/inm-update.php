<?php
include("../../connect/conectar.php");
include("../../controlador/admin/inmuebleControlador.php");

session_start();
$name_user = $_SESSION['name_user'];
$lastname_user = $_SESSION['lastname_user'];

if (!isset($_SESSION['logueado']) || !$_SESSION['logueado']) {
	header("Location: ../guest/login.php");
}

$obj = new Inmueble();
if($_POST){

	$obj->id_inm = $_POST['id_inm'];
    $obj->id_usuario = $_POST['id_usuario'];
    $obj->estado_inm = $_POST['estado_inm'];
    $obj->direccion_inm = $_POST['direccion_inm'];
    $obj->tipo_inm = $_POST['tipo_inm'];
    $obj->opcion_inm = $_POST['opcion_inm'];
    $obj->localidad_inm = $_POST['localidad_inm'];
    $obj->barrio_inm = $_POST['barrio_inm'];
    $obj->inf_inm = $_POST['inf_inm'];
    $obj->desc_inm = $_POST['desc_inm'];
    $obj->precio_inm = $_POST['precio_inm'];
    $obj->fechaC_inm = $_POST['fechaC_inm'];
    $obj->fechaA_inm = $_POST['fechaA_inm'];


}

date_default_timezone_set('America/Bogota');
$fecha = Date('Y-m-d H:i:s');

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
					<img src="../../assets/img/img/logo.png" class="img-fluid" alt="Logo">
					<figcaption class="roboto-medium text-center">
						Administrador
					</figcaption>
				</figure>
				<div class="full-box nav-lateral-bar"></div>
				<nav class="full-box nav-lateral-menu">
				<ul>
						<li>
							<a href="../index-admin.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; INICIO </a>
						</li>

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
							<a href="#" class="nav-btn-submenu"><i class="fas fa-user-tag"></i> &nbsp; ROL USUARIO <i class="fas fa-chevron-down"></i></a>
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
									<a href="doc-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista Tipo Documento</a>
								</li>
								<li>
									<a href="doc-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Tipo Documento</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-city"></i> &nbsp; INMUEBLE <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="inm-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Inmueble</a>
								</li>
								<li>
									<a href="inm-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista inmueble</a>
								</li>
								<li>
									<a href="inm-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar inmueble</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-check"></i> &nbsp; ESTADO INMUEBLE <i class="fas fa-chevron-down"></i></a>
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
							<a href="#" class="nav-btn-submenu"><i class="fas fa-list"></i> &nbsp; TIPO INMUEBLE <i class="fas fa-chevron-down"></i></a>
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
							<a href="#" class="nav-btn-submenu"><i class="fas fa-laptop-house"></i> &nbsp; OPCION INMUEBLE <i class="fas fa-chevron-down"></i></a>
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
				<a href="../index.php">
					<i class="fas fa-pager"></i>
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
						<legend class="text-center"><i class="fas fa-user"></i> &nbsp; Ingresa Codigo de Inmueble</legend>
						<p class="text-center">Para Actualizarlo</p>

						<div class="container-fluid">
							<div class="row">

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">CODIGO INMUEBLE:</label>
										<input type="number" class="form-control" name="id_inm" id="id_inm" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<select class="form-control" name="estado_inm" id="estado_inm" required>
											<option selected disabled>ESTADO INMUEBLE:</option>
											<option value="1">Disponible</option>
											<option value="2">Arrendado</option>
											<option value="2">Vendido</option>
										</select>
									</div>
								</div>

								<input type="hidden" name="id_usuario" id="id_usuario">

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">DIRECCION:</label>
										<input type="text" class="form-control" name="direccion_inm" id="direccion_inm" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<select class="form-control" name="tipo_inm" id="tipo_inm" required>
											<option selected disabled>TIPO INMUEBLE:</option>
											<option value="1">Apartamento</option>
											<option value="2">Casa</option>
											<option value="3">Finca</option>
											<option value="4">Lote</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<select class="form-control" name="opcion_inm" id="opcion_inm" required>
											<option selected disabled>OPCION INMUEBLE:</option>
											<option value="1">Arrendar</option>
											<option value="2">Vender</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label  class="bmd-label-floating">LOCALIDAD:</label>
										<select class="form-control" name="localidad_inm" id="localidad_inm" required>
											<option selected disabled>LOCALIDAD INMUEBLE:</option>
											<option value="1">Usaquén</option>
											<option value="2">Chapinero</option>
											<option value="3">Santa Fe</option>
											<option value="4">San Cristóbal</option>
											<option value="5">Usme</option>
											<option value="6">Tunjuelito</option>
											<option value="7">Bosa</option>
											<option value="8">Kennedy</option>
											<option value="9">Fontibón</option>
											<option value="10">Engativá</option>
											<option value="11">Suba</option>
											<option value="12">Barrios Unidos</option>
											<option value="13">Teusaquillo</option>
											<option value="14">Los Mártires</option>
											<option value="15">Antonio Nariño</option>
											<option value="16">Puente Aranda</option>
											<option value="17">Candelaria</option>
											<option value="18">Rafael Uribe Uribe</option>
											<option value="19">Ciudad Bolívar</option>
											<option value="20">Sumapaz</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label  class="bmd-label-floating">BARRIO:</label>
										<input type="text" class="form-control" name="barrio_inm" id="barrio_inm" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">INFORMACION TECNICA:</label>
										<input type="text" class="form-control" name="inf_inm" id="inf_inm" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label  class="bmd-label-floating">DESCRIPCION:</label>
										<input type="text" class="form-control" name="desc_inm" id="desc_inm" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">PRECIO DE LA PROPIEDAD:</label>
										<input type="number" class="form-control" name="precio_inm" id="precio_inm" required>
									</div>
								</div>

								<input type="hidden" name="fechaC_inm" id="fechaC_inm">

								<input type="hidden" name="fechaA_inm" id="fechaA_inm" value="<?php echo $fecha ?>">

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