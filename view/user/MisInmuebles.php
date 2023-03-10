<?php
include("../../connect/conectar.php");
include("../../controller/user/propertyController.php");

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
    
}

$conec = new Conexion();
$c = $conec->conectando();
$query = "select count(*) as totalRegistros from property where id_user='$id_user'";
$resultado = mysqli_query($c,$query);
$arreglo = mysqli_fetch_array($resultado);
$totalRegistros = $arreglo['totalRegistros']; //'totalRegistros'
//echo $totalRegistros;
$maximoRegistros =5;
//echo $totalRegistros;
if(empty($_GET['pagina'])){
    $pagina=1;
}else{
    $pagina=$_GET['pagina'];
}
$desde = ($pagina-1)*$maximoRegistros;
$totalPaginas=ceil($totalRegistros/$maximoRegistros);
//echo $totalPaginas;

$query2="select * from property limit $desde,$maximoRegistros";
$resultado2=mysqli_query($c,$query2);
$arreglo2= mysqli_fetch_array($resultado2);

if(isset($_POST['search'])){
    //echo "llegue";
    $query2="select * from property where id_user='$id_user' like '%$obj->id_property%' limit $desde,$maximoRegistros";
    $resultado2=mysqli_query($c,$query2);
    $arreglo2 = mysqli_fetch_array($resultado2);
}else{
    $query2="select * from property where id_user='$id_user' limit $desde,$maximoRegistros ";
    $resultado2=mysqli_query($c,$query2);
    $arreglo2 = mysqli_fetch_array($resultado2);
}

if($arreglo2==0){
    //echo("No hay registros");
}else{
    $id_state_property = $arreglo2[2];
    $query3= "SELECT * FROM state_property WHERE id_state_property = '$id_state_property'";
    $resultado3 = mysqli_query($c,$query3);
    $arreglo3=mysqli_fetch_array($resultado3);

    $id_type_property = $arreglo2[4];
    $query4= "SELECT * FROM type_property WHERE id_type_property = '$id_type_property'";
    $resultado4 = mysqli_query($c,$query4);
    $arreglo4=mysqli_fetch_array($resultado4);

    $id_option_property = $arreglo2[5];
    $query5= "SELECT * FROM option_property WHERE id_option_property = '$id_option_property'";
    $resultado5 = mysqli_query($c,$query5);
    $arreglo5=mysqli_fetch_array($resultado5);

    $id_location_property = $arreglo2[6];
    $query6= "SELECT * FROM location_property WHERE id_location_property = '$id_location_property'";
    $resultado6 = mysqli_query($c,$query6);
    $arreglo6=mysqli_fetch_array($resultado6);
    }


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
    <link rel="stylesheet" href="../../config/css/estilosMisInmuebles.css">
     <link rel="stylesheet" href="style.css"> 
    
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
        <h1 class="titulo_muro">MIS INMUEBLES</h1>
				<div class="main-container">
					<table >
						<thead>
							<tr >
								<th>ID INMUEBLE</th>
								<th>USUARIO</th>
								<th>ESTADO</th>
								<th>DIRECCION</th>
								<th>TIPO</th>
								<th>OPCION</th>
								<th>LOCALIDAD</th>
								<th>BARRIO</th>
								<th>INFORMACION</th>
								<th>DESCRIPCION</th>
								<th>PRECIO</th>
								<th>ACTUALIZAR</th>
								<th>ELIMINAR</th>
							</tr>
						</thead>
							<tr>
							<?php
                            if($arreglo2==0){
                                //echo "No hay registro";
                            ?>
                            <div class="No_registro">
                                <?php echo "No tienes inmuebles publicados" ?>
                            </div>
                            <?php
                            }
                             else{
                                do{
                            ?>
							</tr>
							<tr >
								<td><?php echo $arreglo2[0];?></td>
								<td><?php echo $arreglo2[1];?></td>
								<td><?php echo $arreglo3[1];?></td>
								<td><?php echo $arreglo2[3];?></td>
								<td><?php echo $arreglo4[1];?></td>
								<td><?php echo $arreglo5[1];?></td>
								<td><?php echo $arreglo6[1];?></td>
								<td><?php echo $arreglo2[7];?></td>
								<td><?php echo $arreglo2[8];?></td>
								<td><?php echo $arreglo2[9];?></td>
								<td><?php echo $arreglo2[10];?></td>
								<td>
									<a  class="btn btn-success" href="<?php 
										if($arreglo2[0]<>''){
												echo "updateinmuser.php?key=".urlencode($arreglo2[0]) ;
											}
										?>" >
										<i style="color: black;" class="fas fa-edit"></i>
									</a>
								</td>
								<td>
									<form action="" name="eliminaInmueble" method="POST">
										<input type="hidden" name="id_property" value="<?php echo $arreglo2[0];?>">
										<input type="hidden" name="id_user"></input>
										<input type="hidden" name="state_property"></input>
										<input type="hidden" name="direction_property"></input>
										<input type="hidden" name="type_property"></input>
										<input type="hidden" name="option_property"></input>
										<input type="hidden" name="location_property"></input>
										<input type="hidden" name="neighborhood_property"></input>
										<input type="hidden" name="information_property"></input>
										<input type="hidden" name="description_property"></input>
										<input type="hidden" name="cost_property"></input>
										<input type="hidden" name="create_property"></input>
										<input type="hidden" name="update_property"></input>
										<button type="submit" class="btn btn-warning" name="elimina">
                                            <i class="fas fa-trash"></i>
										</button>

									</form>
								</td>
							</tr>
							<?php
                            }while($arreglo2 = mysqli_fetch_array($resultado2));
                       		}
                        	?>
					</table>
                    <button class="excel">
					    <a href="../../connect/excelindexuser.php"><i style="font-size: 27px; margin-left:7px;" class="fas fa-file-excel"></i> &nbsp;</a>
				    </button>
				</div>
                <nav class="paginador" aria-label="Page navigation example">
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
    </header>
    <footer style="margin-top:390px">  
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