<?php
include("../../connect/conectar.php");
include("../../controller/admin/stateUController.php");

session_start();
$name_user = $_SESSION['name_user'];
$lastname_user = $_SESSION['lastname_user'];

if (!isset($_SESSION['logueado']) || !$_SESSION['logueado']) {
	header("Location: ../guest/login.php");
}

$obj = new StateU();
if($_POST){

	$obj->id_state_user = $_POST['id_state_user'];

}

$conet = new Conexion();
$c = $conet->conectando();

$query="select count(*) as totalRegistros from state_user";
$resultado = mysqli_query($c, $query);
$arreglo = mysqli_fetch_array($resultado); 
$totalRegistros = $arreglo['totalRegistros'];
//echo $totalRegistros;

$maximoRegistros = 10;
//echo $totalRegistros;
if(empty($_GET['pagina'])){
    $pagina=1;
}else{
    $pagina=$_GET['pagina'];
}
$desde = ($pagina-1)*$maximoRegistros;
$totalPaginas=ceil($totalRegistros/$maximoRegistros);
//echo $totalPaginas;


if(isset($_POST['search'])){
    $query2="select * from state_user where name_state_user like '%$obj->name_state_user%' limit $desde,$maximoRegistros";
    $resultado2=mysqli_query($c,$query2);
    $arreglo2 = mysqli_fetch_array($resultado2);
}else{
    $query2="select * from state_user limit $desde,$maximoRegistros ";
    $resultado2=mysqli_query($c,$query2);
    $arreglo2 = mysqli_fetch_array($resultado2);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Estado Usuario</title>

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
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA ESTADO USUARIO
				</h3>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="sta-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR ESTADO USUARIO</a>
					</li>
					<li>
						<a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA ESTADO USUARIO</a>
					</li>
					<li>
						<a href="sta-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR ESTADO USUARIO</a>
					</li>
				</ul>	
			</div>

			<!-- Content -->
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>ID ESTADO USUARIO</th>
								<th>ESTADO USUARIO</th>
								<th>ACTUALIZAR</th>
								<th>ELIMINAR</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
                            		if($arreglo2==0){
                                	//echo "No hay registro";
                            	?>
                            	<div class="alert alert-success" role="alert">
                                	<?php echo "No hay registros" ?>
                            	</div>
                            	<?php
                            	}
                             	else{
                                	do{
                            ?>
							</tr>
							<tr class="text-center" >
								<td><?php echo $arreglo2[0] ?></td>
								<td><?php echo $arreglo2[1] ?></td>
								<td>
									<a  class="btn btn-success" href="<?php 
										if($arreglo2[0]<>''){
											echo "sta-update.php?key=".urlencode($arreglo2[0]) ;
										}
																		?>" >
										<i class="fas fa-sync-alt"></i>	
									</a>
								</td>
								<td>
									<form action="" name="" method="POST">
										<input type="hidden" name="id_state_user" value="<?php echo $arreglo2[0] ?>"></input>
										<input type="hidden" name="name_state_user"></input>
										<button type="submit" name="elimina" class="btn btn-warning">
		  									<i class="far fa-trash-alt"></i>
										</button>
									</form>
								</td>
							</tr>
							<?php
                            }while($arreglo2 = mysqli_fetch_array($resultado2));
                       		}
                        	?>
						</tbody>
					</table>
				</div>
				<nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php 
                    if($pagina!=1){
                    ?>
                    <li class="page-item ">
                        <a class="page-link" href="?pagina=<?php echo 1; ?>"><</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?pagina=<?php echo $pagina-1; ?>"><<</a>
                    </li>
                    <?php
                    }
                    for($i=1; $i<=$totalPaginas; $i++){
                        if($i==$pagina){
                            echo'<li class="page-item active" aria-current="page"><a class="page-link" href="?pagina='.$i.'">'.$i.'</a></li>';    
                        }
                        else{
                            echo'<li class="page-item "><a class="page-link" href="?pagina='.$i.'">'.$i.'</a></li>'; 
                        }
                    }
                    if($pagina !=$totalPaginas){
                    ?>
                    
                    <li class="page-item">
                        <a class="page-link" href="?pagina=<?php echo $pagina+1; ?>">>></a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?pagina=<?php echo $totalPaginas; ?>">></a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
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