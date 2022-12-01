<?php
include("../../connect/conectar.php");
include("../../controlador/admin/usuarioControlador.php");

$obj = new Usuario();
if($_POST){

    $obj->numeroDocumento = $_POST['numeroDocumento'];
	$obj->rolUsuario = $_POST['rolUsuario'];
    $obj->tipoDocumento = $_POST['tipoDocumento'];
    $obj->nombreUsuario = $_POST['nombreUsuario'];
    $obj->apellidoUsuario = $_POST['apellidoUsuario'];
    $obj->emailUsuario = $_POST['emailUsuario'];
    $obj->contraUsuario = $_POST['contraUsuario'];
    $obj->celUsuario = $_POST['celUsuario'];
    $obj->fechaCUsuario = $_POST['fechaCUsuario'];
    $obj->fechaAUsuario = $_POST['fechaAUsuario'];

}


date_default_timezone_set('America/Bogota');
$fecha = Date('Y-m-d H:i:s');

$key=$_GET['key'];
$conet = new Conexion();
$c = $conet->conectando();
$query="select * from usuario where num_id_usuario = '$key'";
$resultado = mysqli_query($c, $query);
$arreglo = mysqli_fetch_array($resultado); 

$obj->numeroDocumento = $arreglo[0];
$obj->rolUsuario = $arreglo[1];
$obj->tipoDocumento = $arreglo[2];
$obj->nombreUsuario = $arreglo[3];
$obj->apellidoUsuario = $arreglo[4];
$obj->emailUsuario = $arreglo[6];
$obj->contraUsuario = $arreglo[7];
$obj->celUsuario = $arreglo[5];
$obj->fechaCUsuario = $arreglo[8];
$obj->fechaAUsuario = $arreglo[9];

$query1="select * from rol";
$resultado1 = mysqli_query($c, $query1);
$arreglo1 = mysqli_fetch_array($resultado1); 

$query3="select * from tipo_documento";
$resultado3 = mysqli_query($c, $query3);
$arreglo3 = mysqli_fetch_array($resultado3); 

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
					<img src="../../assets/img/img/logo.png" class="img-fluid" alt="Logo">
					<figcaption class="roboto-medium text-center">
						Administrador
					</figcaption>
				</figure>
				<div class="full-box nav-lateral-bar"></div>
				<nav class="full-box nav-lateral-menu">
				<ul>
						<li>
							<a href="index-admin.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; INICIO </a>
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
						<legend class="text-center"><i class="fas fa-user"></i> &nbsp; Ingresa el Número de Identificación</legend>
						<p class="text-center">Para Actualizar Usuario</p>

						<div class="container-fluid">
							<div class="row">

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">NUMERO DE IDENTIFICACION:</label>
										<input type="number" class="form-control" name="numeroDocumento" id="numeroDocumento"  value="<?php echo $obj->numeroDocumento; ?>" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<select class="form-control" name="rolUsuario" id="rolUsuario" required>
											<option>
												 <?php
												 	$conet = new Conexion();
													 $c = $conet->conectando();
													 $query2="SELECT * from rol where id_rol = $obj->rolUsuario";
													 $resultado2 = mysqli_query($c, $query2);
													 $arreglo2 = mysqli_fetch_row($resultado2); 
													 echo $arreglo2[1];
													do{
														$id = $arreglo1['id_rol'];
														$nombre=$arreglo1['nom_rol'];
														if($id==$obj->rolUsuario){
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
										<select class="form-control" name="tipoDocumento" id="tipoDocumento" required>
											<option selected disabled>Seleccione Tipo de Documento:</option>
											<option>
											<?php
												 	$conet = new Conexion();
													 $c = $conet->conectando();
													 $query4="SELECT * from tipo_documento where id_tipo_doc = $obj->tipoDocumento";
													 $resultado4 = mysqli_query($c, $query4);
													 $arreglo4 = mysqli_fetch_row($resultado4);						 
													do{
														$id = $arreglo3['id_tipo_doc'];
														$nombre=$arreglo3['nom_tipo_doc'];
														if($id==$obj->tipoDocumento){
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
											

											</option>
											
										</select>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">NOMBRE:</label>
										<input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario" value ="<?php echo $obj->nombreUsuario ?>" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">APELLIDO:</label>
										<input type="text" class="form-control" name="apellidoUsuario" id="apellidoUsuario" value="<?php echo $obj->apellidoUsuario ?>" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">CELULAR:</label>
										<input type="number" class="form-control" name="celUsuario" id="celUsuario"  value="<?php echo $obj->celUsuario ?>" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">EMAIL:</label>
										<input type="email" class="form-control" name="emailUsuario" id="emailUsuario" value="<?php  echo $obj->emailUsuario  ?>" required>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">CONTRASEÑA:</label>
										<input type="password" class="form-control" name="contraUsuario" id="contraUsuario" value="<?php echo $obj->contraUsuario ?>" required>
									</div>
								</div>

								<input type="hidden" name="fechaCUsuario" id="fechaCUsuario">

								<input type="hidden" name="fechaAUsuario" id="fechaAUsuario" value="<?php echo $fecha ?>">

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