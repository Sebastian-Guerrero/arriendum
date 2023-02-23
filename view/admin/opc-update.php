<?php
include("../../connect/conectar.php");
include("../../controller/admin/optionController.php");

session_start();
$name_user = $_SESSION['name_user'];
$lastname_user = $_SESSION['lastname_user'];

if (!isset($_SESSION['logueado']) || !$_SESSION['logueado']) {
	header("Location: ../guest/login.php");
}

$obj = new Option();
if($_POST){

	$obj->id_option_property = $_POST['id_option_property'];
    $obj->name_option_property = $_POST['name_option_property'];

}

$key=$_GET['key'];
$conet = new Conexion();
$c = $conet->conectando();

$query="SELECT * FROM option_property WHERE id_option_property = '$key'";
$resultado = mysqli_query($c, $query);
$arreglo = mysqli_fetch_array($resultado); 

$obj->id_option_property = $arreglo[0];
$obj->name_option_property = $arreglo[1];

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Opcion Inmueble</title>

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
					<i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR OPCION INMUEBLE
				</h3>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="opc-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR OPCION INMUEBLE</a>
					</li>
					<li>
						<a href="opc-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA OPCION INMUEBLE</a>
					</li>
					<li>
						<a href="opc-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR OPCION INMUEBLE</a>
					</li>
				</ul>	
			</div>
			
			<!-- Content here-->
            <div class="container-fluid">
				<form class="form-neon" action="" method="POST" autocomplete="off">
					<fieldset>
						<legend class="text-center"><i class="fas fa-laptop-house"></i> &nbsp; Actualizar Opcion Inmueble</legend>

						<div class="container-fluid">
							<div class="row">

							<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">ID OPCION INMUEBLE:</label>
										<input type="number" readonly class="form-control" name="id_option_property" id="id_option_property" value ="<?php echo $obj->id_option_property ?>">
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">NUEVO NOMBRE PARA OPCION INMUEBLE:</label>
										<input type="text" class="form-control" name="name_option_property" id="name_option_property" value ="<?php echo $obj->name_option_property ?>" required>
									</div>
								</div>


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