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
    if ($obj->location_property == 0) {
        $_SESSION["alerta_vacio"] = "1";
        $query2="select * from location_property limit $desde,$maximoRegistros";
        $resultado2=mysqli_query($c,$query2);
        $num_rows = mysqli_num_rows($result);
    }else{
        $query2="select * from property where location_property = $obj->location_property limit $desde,$maximoRegistros";
        $result=mysqli_query($c,$query2);
        $num_rows = mysqli_num_rows($result);
    }
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
    <link rel="stylesheet" href="../../config/css/sweetalert2.min.css"/>
    <link rel="stylesheet" href="../../config/css/estilos_filtro.css"/>


    
    <title>Arriendum</title>
</head>
<body>
        <nav>
            <img class="logo" src="../../assets/icons/logo.png">
            <ul>
                <li><button class="ba" type="button"><a href="index-user.php">INICIO</a></button></li>
                <li><button class="ba" type="button"><a href="../../view/user/profile.php?id_user=<?php echo $_SESSION['id_user']; ?>"> MI PERFIL </a></button></li>
                <li><button class="bb" type="button"><a href="../../view/user/pub-inm.php">PUBLICA TU INMUEBLE</a></button></li>
                <li><a onclick="cerrar_sesion()" class="btn-exit-system"><i class="fas fa-power-off"></i></a></li>
            </ul>
        </nav>
        <br>
        <br>
        <br>
        <br>


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
                                                        <a href="<?php 
                                                            if($fila[0]<>''){
                                                                echo "?key=".urlencode($fila[0]) ;
                                                        }
                                                        ?>" >
                                                            Mas
                                                        </a>
                                                        </label>
                                                    </div>

                                                </div>

                                            <?php
                                            }
                                            ?>
                                                    <?php
                                                    }
                                                    ?>

                                                    <?php

$key=$_GET['key'];

$query6 = "SELECT * FROM property WHERE id_property = $key";
$result6 = mysqli_query($c, $query6);
$fila6 = mysqli_fetch_array($result6);

$id = $fila6['id_user'];
$location = $fila6['location_property'];

$query8 = "SELECT * FROM user WHERE id_user = $id";
$result8 = mysqli_query($c, $query8);
$fila8 = mysqli_fetch_array($result8);

$query9 = "SELECT * FROM location_property WHERE id_location_property = $location";
$result9 = mysqli_query($c, $query9);
$fila9 = mysqli_fetch_array($result9);

?>

<input type="checkbox" id="btn-modal">
<div class="container-modal">
<div class="content-modal">
<h2>Inmueble: <?php echo $fila6['id_property']; ?> - Dueño: <?php echo $fila8['name_user']; ?> <?php echo $fila8['lastname_user']; ?></h2>

<?php

 $query7 = "SELECT All name_galery_property FROM galery_property WHERE id_property  =  $key";
 $result7 = mysqli_query($c, $query7);
 
while ($fila7 = mysqli_fetch_array($result7)) {

?>

<div class="mi">
<img src="<?php echo $fila7['name_galery_property']; ?>">
</div>

<?php
};
?>
<h3>Datos del Dueño:</h3>

<p class="pi"><b>Celular:</b> <?php echo $fila8['phone_user']; ?></p>

<p class="pf"><b>Email:</b> <?php echo $fila8['email_user']; ?></p>

<h3>Datos de la Propiedad:</h3>

<p class="pi"><b>Localidad:</b> <?php echo $fila9['name_location_property']; ?></p>
 
<p><b>Barrio:</b> <?php echo $fila6['neighborhood_property']; ?></p>

<p><b>Dirreccion:</b> <?php echo $fila6['direction_property']; ?></p>

<p><b>Informacion:</b> <?php echo $fila6['information_property']; ?></p>

<p><b>Descripcion:</b> <?php echo $fila6['description_property']; ?></p>

<p class="pf"><b>Precio:</b> <?php echo $fila6['cost_property']; ?></p>
<div class="btn-cerrar">
    <label for="btn-modal">Cerrar</label>
</div>
</div>
<label for="btn-modal" class="cerrar-modal"></label>
</div>
                                                </div>

                                        </section>
                   
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
</body>

</html>