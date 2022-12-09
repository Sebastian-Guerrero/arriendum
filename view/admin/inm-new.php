<?php
include("../../connect/conectar.php");
include("../../controller/admin/inmuebleControlador.php");


$obj = new Inmueble();
if($_POST)
{

	$obj->id_property = $_POST['id_property'];
    $obj->id_user = $_POST['id_user'];
    $obj->state_property = $_POST['state_property'];
    $obj->direction_property = $_POST['direction_property'];
    $obj->type_property = $_POST['type_property'];
    $obj->option_property = $_POST['option_property'];
    $obj->localidad_inm = $_POST['localidad_inm'];
    $obj->neighborhood_property = $_POST['neighborhood_property'];
    $obj->information_property = $_POST['information_property'];
    $obj->description_property = $_POST['description_property'];
    $obj->cost_property = $_POST['cost_property'];
    $obj->create_property = $_POST['create_property'];
    $obj->update_property = $_POST['update_property'];

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
					<img src="../../assets/icons/logo.png" class="img-fluid" alt="Logo">
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
					<i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR INMUEBLE
				</h3>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a class="active" href="inm-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR INMUEBLE</a>
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

								
				
			<form name="agregarInmueble" action="" class="form-neon" method="POST" autocomplete="off">
						<legend class="text-center"><i class="fas fa-city"></i> &nbsp; Registro Inmueble</legend>
						<div class="container-fluid">
							<div class="row">

								<input type="hidden" name="id_property" id="id_property">

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">NUMERO DE IDENTIFICACION:</label>
										<input type="number" class="form-control" name="id_user" id="id_user" required>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<select class="form-control" name="state_property" id="state_property" required>
											<option selected disabled>ESTADO DEL INMUEBLE</option>
											<option value="1">Disponible</option>
											<option value="2">Arrendado </option>
											<option value="3">Vendido</option>
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">DIRRECION:</label>
										<input type="text" class="form-control" name="direction_property" id="direction_property" required>
									</div>
								</div>
					
								<div class="col-12 col-md-6">
									<div class="form-group">
										<select class="form-control" name="type_property" id="type_property" required>
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
										<select class="form-control" name="option_property" id="option_property" required>
											<option selected disabled>OPCION INMUEBLE:</option>
											<option value="1">Arrendar</option>
											<option value="2">Vender</option>
										</select>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label  class="bmd-label-floating">LOCALIDAD:</label>
										<select class="form-control" name="location_property" id="location_property" required>
											<option selected disabled>Seleccione la localidad:</option>
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
										<input type="text" class="form-control" name="neighborhood_property" id="neighborhood_property" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">INFORMACION TECNICA:</label>
										<input type="text" class="form-control" name="information_property" id="information_property" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label  class="bmd-label-floating">DESCRIPCION:</label>
										<input type="text" class="form-control" name="description_property" id="description_property" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">PRECIO DE LA PROPIEDAD:</label>
										<input type="number" class="form-control" name="cost_property" id="cost_property" required>
									</div>
								</div>

								<input type="hidden" name="create_property" id="create_property" value="<?php echo $fecha ?>">

								<input type="hidden" name="update_property" id="update_property" value="<?php echo $fecha ?>">

						</div> 
					<p class="text-center" style="margin-top: 40px;">
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
						&nbsp; &nbsp;
						<button type="submit" class="btn btn-raised btn-info btn-sm" name="guarda"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
					</p>
				</form>

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