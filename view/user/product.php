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
$num_rows_i = mysqli_num_rows($result);
$_SESSION ["contador"] = "1";

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
    $query2="select * from property where location_property = $obj->location_property limit $desde,$maximoRegistros";
    $result=mysqli_query($c,$query2);
    $num_rows = mysqli_num_rows($result);
    unset($_POST['search'] );
}else{
    $query2="select * from location_property limit $desde,$maximoRegistros";
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
 
    <link rel="stylesheet" href="../../config/css/estilos.css"/>
    <link rel="stylesheet" href="../../config/css/productos.css"/>
    <link rel="stylesheet" href="../../config/a/css/all.css">

    
    <title>Arriendum</title>
</head>

<body>
        <nav>
            <img class="logo" src="../../assets/icons/logo.png">
            <ul>
                <li><button class="ba" type="button"><a href="index-user.php">INICIO</a></button></li>
                <li><button class="ba" type="button"><a href="../../view/user/profile.php?id_user=<?php echo $_SESSION['id_user']; ?>"> MI PERFIL </a></button></li>
                <li><button class="bb" type="button"><a href="../../view/user/pub-inm.php">PUBLICA TU INMUEBLE</a></button></li>
                <li><a href="../../connect/logout.php" class="btn-exit-system"><i class="fas fa-power-off"></i></a></li>
            </ul>
        </nav>
		</header>
		<div class="container mt-5">
    <div class="col-12">
        <div class="row">
                <div class="col-12 grid-margin">
                        <div class="card">
                                <div class="card-body">
                                        <h4 class="card-title">Buscador</h4>
                                        <form id="form2" name="form2" method="POST" action="product.php">
                                                <div class="col-12 row">
                                                        <div class="col-11">
                                                        <label  class="form-label">¿Que localidad deseas?</label>
                                                        <script>
                                                                function validar(){
                                                                    var Localidadinmueble=document.getElementById('location_property');
                                                                    if (Localidadinmueble.value==0 ||
                                                                        Localidadinmueble.value=="")
                                                                    {
                                                                        alert("Selecciona una localidad para continuar");
                                                                        Localidadinmueble.focus();
                                                                        
                                                                    }
                                                                }
                                                        </script>
                                                        <select name="location_property" id="location_property" required>
                                                                <option value="0" >Seleccione la localidad:</option>
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
                                                                    <button type="submit" onclick="validar();" value="validar" class="btn btn-raised btn-info" name="search"><i class="fas fa-search"></i> &nbsp; BUSCAR</button>
                                                                    <a href="product.php">
                                                                        <button class="btn btn-raised btn-info"><i class="fas fa-sync-alt"></i> &nbsp;REINICIAR</button>
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

                                            while ($fila = mysqli_fetch_array($result)) {
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

                                                    <div class="boton-modal">
                                                        <label for="btn-modal">
                                                            Mas Informacion...
                                                        </label>
                                                    </div>

                                                </div>

                                                <?php

$query6 = "SELECT * FROM user WHERE id_user = $id";
$result6 = mysqli_query($c, $query6);
$fila6 = mysqli_fetch_array($result6); 

?>

<input type="checkbox" id="btn-modal">
<div class="container-modal">
<div class="content-modal">
<h2>Inmueble: <?php echo $fila['id_property']; ?> - Dueño: <?php echo $fila6['name_user']; ?> <?php echo $fila6['lastname_user']; ?></h2>

<div class="mi">
<img src="<?php echo $fila5['name_galery_property']; ?>">
</div>
<h3>Datos del Dueño:</h3>

<p class="pi"><b>Celular:</b> <?php echo $fila6['phone_user']; ?></p>

<p class="pf"><b>Email:</b> <?php echo $fila6['email_user']; ?></p>

<h3>Datos de la Propiedad:</h3>

<p class="pi"><b>Localidad:</b> <?php echo $fila4['name_location_property']; ?></p>

<p><b>Barrio:</b> <?php echo $fila['neighborhood_property']; ?></p>

<p><b>Dirreccion:</b> <?php echo $fila['direction_property']; ?></p>

<p><b>Informacion:</b> <?php echo $fila['information_property']; ?></p>

<p><b>Descripcion:</b> <?php echo $fila['description_property']; ?></p>

<p class="pf"><b>Precio:</b> <?php echo $fila['cost_property']; ?></p>
<div class="btn-cerrar">
    <label for="btn-modal">Cerrar</label>
</div>
</div>
<label for="btn-modal" class="cerrar-modal"></label>
</div>    
                                            <?php
                                            }
                                            ?>
                                                 
                                                    <?php
                                                    }
                                                    ?>   
                                                </div>
                                        </section>
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

 <footer>  
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