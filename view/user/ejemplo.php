<?php
include("../../connect/conectar.php");
$conet = new Conexion();
$c = $conet->conectando();

session_start();
$name_user = $_SESSION['name_user'];
$lastname_user = $_SESSION['lastname_user'];

if (!isset($_SESSION['logueado']) || !$_SESSION['logueado']) {
  header("Location: ../guest/login.php");
}

if($_POST){

	$obj->location_property = $_POST['location_property'];

}

$query = "SELECT * FROM property";
$result = mysqli_query($c, $query); 

$conet = new Conexion();
$c = $conet->conectando();
$query="select count(*) as totalRegistros from property";
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
    $query2="SELECT * FROM property where location_property like '%$obj->location_property%' limit $desde,$maximoRegistros";
    $resultado2=mysqli_query($c,$query2);
    $arreglo2 = mysqli_fetch_array($resultado2);
}else{
    $query2="SELECT * FROM property limit $desde,$maximoRegistros";
    $resultado2=mysqli_query($c,$query2);
    $arreglo2 = mysqli_fetch_array($resultado2);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="../../config/css/estilos.css"/>
    <link rel="stylesheet" href="../../config/css/productos.css"/>

    
    <title>Arriendum</title>
</head>

<body>
        <nav>
            <img class="logo" src="../../assets/icons/logo.png">
            <ul>
                <li><button class="ba" type="button"><a href="../../index.php">INICIO</a></button></li>
                <li><button class="bb" type="button"><a href="../../view/user/pub-inm.php">PUBLICA TU INMUEBLE</a></button></li>
            </ul>
        </nav>
		</header>
		<form action="" name="inmueble" method="POST" autocomplete="off">
			<div class="container-fluid">
				<form class="form-neon" action="" role="search" autocomplete="off">
					<div class="container-fluid">
						<div class="row justify-content-md-center">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label class="bmd-label-floating">INGRESA LOCALIDAD DESEADA</label>
									<input class="form-control me-2" type="search" name="location_property" aria-label="Search">
								</div>
							</div>
							<div class="col-12">
								<p class="text-center" style="margin-top: 40px;">
									<button type="submit" class="btn btn-raised btn-info" name="search"><i class="fas fa-search"></i> &nbsp; BUSCAR</button>
								</p>
							</div>
						</div>
					</div>
				</form>
			</div>

      
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
                                        <section class="catalogo">
                                        <div  class="card">
                                                    <?php echo $arreglo2[0] ?>
                                                    <?php echo $arreglo2[1] ?>
                                                    <?php echo $arreglo2[2] ?>
                                                    <?php echo $arreglo2[3] ?>
                                                    <?php echo $arreglo2[4] ?>
                                                    <?php echo $arreglo2[5] ?>
                                                    <?php echo $arreglo2[6] ?>
                                                    <?php echo $arreglo2[7] ?>
                                                    <?php echo $arreglo2[8] ?>
                                                    <?php echo $arreglo2[9] ?>
                                                    <?php echo $arreglo2[10] ?>
                                                    <?php echo $arreglo2[11] ?>
                                                    <?php echo $arreglo2[12] ?>
                                                    
                                                    <?php
                                                    }while($arreglo2 = mysqli_fetch_array($resultado2));
                                                    }
                                                    
                                                    ?>   
                                                </div>
                                        </section>
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
		
		</section>
        

    <footer style="margin-top: 400px;">  
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>Phone</h4>
                <p>8296312</p>
            </div>
            <div class="content-foo">
                <h4>Email</h4>
                <p>8296312</p>
            </div>
            <div class="content-foo">
                <h4>Location</h4>
                <p>8296312</p>
            </div>
        </div>
        <h2 class="titulo-final">&copy; Arriendum </h2>
    </footer>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="js/main.js"></script>
</body>

</html>