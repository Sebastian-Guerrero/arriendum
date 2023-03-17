<?php
include("../../connect/conectar.php");
$conet = new Conexion();
$c = $conet->conectando();

if($_POST){

	$obj->location_property = $_POST['location_property'];

}

session_start();
$_SESSION ["contador"] = "1";


$conet = new Conexion();
$c = $conet->conectando();
$query="SELECT count(*) AS totalRegistros FROM property";
$resultado = mysqli_query($c, $query);
$arreglo = mysqli_fetch_array($resultado); 
$totalRegistros = $arreglo['totalRegistros'];
//echo $totalRegistros;

$maximoRegistros = 9;
//echo $totalRegistros;
if(empty($_GET['pagina'])){
    $pagina=1;
}else{
    $pagina=$_GET['pagina'];
}
$desde = ($pagina-1)*$maximoRegistros;
$totalPaginas=ceil($totalRegistros/$maximoRegistros);
//echo $totalPaginas;

$consulta = "SELECT * FROM property limit $desde,$maximoRegistros";
$resultado = mysqli_query($c, $consulta);
$fila = mysqli_fetch_array($resultado);

if (isset($_POST['search'])){
    if ($obj->location_property==0) {
        $_SESSION["alerta_vacio"] = "1";
    }else {
        $consulta = "SELECT * FROM property WHERE location_property = $obj->location_property limit $desde,$maximoRegistros";
        $resultado = mysqli_query($c, $consulta);
        $fila = mysqli_fetch_array($resultado);

}}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
 
    <link rel="stylesheet" href="../../config/css/estilos.css"/>
    <link rel="stylesheet" href="../../config/css/productos.css"/>
    <link rel="stylesheet" href="../../config/a/css/all.css">
    <link rel="stylesheet" href="../../config/css/sweetalert2.min.css"/>
    <link rel="stylesheet" href="../../config/css/estilos_filtro.css"/>
    <link rel="stylesheet" href="../../config/icomoon/style.css">


    
    <title>Arriendum</title>
</head>
<body>
        <nav>
            <img class="logo" src="../../assets/icons/logo.png">
            <ul>
                <li><button class="ba" type="button"><a href="../../index.php">INICIO</a></button></li>
                <li><button class="ba" type="button"><a href="../../view/guest/login.php"> INGRESA </a></button></li>
                <li><button class="bb" type="button"><a href="../../view/guest/singin.php">REGISTRATE</a></button></li>
            </ul>
        </nav>
        <br>
        <br>
        <br>
        <br>
        <div class="form_filtro" >
<form  action="" method="POST">
  <p class="name">FILTRO LOCALIDAD</p>
  <hr>
  <div class="container mt-5">
    <div class="col-12">
        <div class="row">
                <div class="col-12 grid-margin">
                        <div class="card">
                                <div class="card-body">
                                    <br>
                                        <form id="form2" name="form2" method="POST" action="product.php">
                                                <div class="col-12 row">
                                                        <div class="col-11">
                                                        <label  class="name">¿Que localidad deseas?</label>
                                                        <select class="boton_select" name="location_property" id="location_property" required>
                                                                <option value="0">Seleccione la localidad</option required >
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
                                                                    <br>
                                                                    <br>
                                                                    <button type="submit"  class="ba" name="search"><i class="fas fa-search"></i> &nbsp; BUSCAR</button>
                                                                    <a href="product.php">
                                                                        <button class="ba"><i class="fas fa-sync-alt"></i> &nbsp;REINICIAR</button>
                                                                    </a>
                                                        </div>
                                                </div>
                                        </form>
                                </div>
                        </div>
                </div>
        </div>
    </div>
</div>  
</form>
</div>
</div>
                                    <?php
                                        if($_SESSION ["contador"] !="1"){
                                        //echo "No hay registro";
                                    ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo "No hay registros" ?>
                                    </div>
                                    <?php
                                    }
                                     else{    
                                    ?>
                                            <section class="catalogo">
                                            <div class="productos">
                                            <?php

                                            foreach ($resultado as $fila) {

                                                $id = $fila['id_user'];
                                                $img = $fila['id_property'];
                                                $estado = $fila['state_property'];
                                                $tipo = $fila['type_property'];
                                                $opcion = $fila['option_property'];
                                                $localidad = $fila['location_property'];
                                            ?>
                                                
                                                <div class="card">

                                                    <?php
                                                
                                                    $query5 = "SELECT name_galery_property FROM galery_property WHERE id_property = $img";
                                                    $result5 = mysqli_query($c, $query5);
                                                    $fila5 = mysqli_fetch_array($result5); 

                                                    ?>
                                                    
                                                    <img src="<?php echo $fila5['name_galery_property']; ?>">

                                                    <?php
                                                    
                                                    $query1 = "SELECT name_state_property FROM state_property WHERE id_state_property = $estado";
                                                    $result1 = mysqli_query($c, $query1);
                                                    $fila1 = mysqli_fetch_array($result1);

                                                    ?>

                                                    <h4><?php echo $fila1['name_state_property']; ?></h4>

                                                  <br>

                                                    <?php

                                                    $query2 = "SELECT name_type_property FROM type_property WHERE id_type_property = $tipo";
                                                    $result2 = mysqli_query($c, $query2);
                                                    $fila2 = mysqli_fetch_array($result2);

                                                    ?>

                                                    <p>Tipo: <?php echo $fila2['name_type_property']; ?></p>

                                                    <?php

                                                    $query3 = "SELECT name_option_property FROM option_property WHERE id_option_property = $opcion";
                                                    $result3 = mysqli_query($c, $query3);
                                                    $fila3 = mysqli_fetch_array($result3);

                                                    ?>

                                                    <p>Inmueble para: <?php echo $fila3['name_option_property']; ?></p>

                                                    <?php

                                                    $query4 = "SELECT name_location_property FROM location_property WHERE id_location_property = $localidad";
                                                    $result4 = mysqli_query($c, $query4);
                                                    $fila4 = mysqli_fetch_array($result4);
                                                    
                                                    ?>

                                                    <p>Localidad: <?php echo $fila4['name_location_property']; ?></p>
                                                    
                                                    <p>Barrio: <?php echo $fila['neighborhood_property']; ?></p>

                                                    <p>Dirreccion: <?php echo $fila['direction_property']; ?></p>

                                                    <p>Precio: <?php echo $fila['cost_property']; ?></p>

                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $fila['id_property']; ?>">
                                                        Mas Informacion
                                                    </button>

                                                </div>

                                                <?php  include('modal.php'); ?>

                                                <?php
                                                    }
                                                    ?>

 
                                                </div>

                                        </section>

                                       
                   
        <?php
                                            }
                                            ?>
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
 <footer>  

        <div class="contenedor-footer">
        <div class="content-foo">
                    <h4>Phone</h4>
                    <p>3203635362</p>
                </div>
                <div class="content-foo">
                    <h4>Email</h4>
                    <p>arriendum@gmail.com</p>
                </div>
                <div class="content-foo">
                    <h4>¿Que es Arriendum?</h4>
                    <p>Arriendum es un aplicativo que permite<br>a las personas realizar la publicacion de sus Inmuebles.</p>
                </div>
                <div class="content-foo">
                    <img class="logo" src="../../assets/icons/logo.png">
                </div>
            </div> 
        <div class="social">
		<ul>
			<li><a href="https://www.facebook.com/profile.php?id=100090515414959&mibextid=ZbWKwL" target="_blank" class="icon-facebook"></a></li>
			<li><a href="https://twitter.com/arriendum" target="_blank" class="icon-twitter"></a></li>
			<li><a href="https://www.instagram.com/arriendum/" target="_blank" class="icon-instagram"></a></li>
			<li><a href="mailto:arriendum@gmail.com" class="icon-mail"></a></li>
            <li><a href="https://github.com/Sebastian-Guerrero/arriendum.git" target="_blank"class="icon-github"></a></li>
		</ul>
	</div>
        <h2 class="titulo-final">&copy; Arriendum </h2>

</footer>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php 
                if(isset($_SESSION["alerta_vacio"])){
                    if ($_SESSION["alerta_vacio"]!="0") {
                        echo "var alerta_vacio = '1';";
                        // echo "var alerta_agenda = '1';";
                        unset($_SESSION["alerta_vacio"]);
                    // }else {
                    //     echo "var alerta_vacio = '0';";
                    //     echo "var alerta_agenda = '1';";
                    //     unset($_SESSION["prof_agenda"]);
                    // }
                    }
                }
        ?>
    </script>
    <script src="../../config/js/alert.js"></script>
    <script src="../../config/js/jquery.min.js"></script>
    <script src="../../config/js/popper.min.js"></script>
    <script src="../../config/js/bootstrap.min.js"></script>
</body>

</html>