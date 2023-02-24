<?php
include("../../connect/conectar.php");

$id_galery_property = $_POST['id_galery_property'];
$id_property = $_POST['id_property'];

if(isset($_POST['guarda'])){
    foreach ($_FILES['imagenes']['tmp_name'] as $key => $value) {

        if (file_exists($_FILES['imagenes']['tmp_name'][$key])) {
          if (move_uploaded_file($_FILES['imagenes']['tmp_name'][$key], '../../assets/img/inmuebles/'.$_FILES['imagenes']['name'][$key])) {
            
            $conet = new Conexion();
            $c = $conet->conectando();

            $ruta = "../../assets/img/inmuebles/".$_FILES['imagenes']['name'][$key];
            $insertar = "INSERT INTO galery_property VALUE(
              '$galery_property',
              '$property',
              '$ruta'                            
            )";
            mysqli_query($c,$insertar);
          }
        }
      }
}

if(isset($_POST['modifica'])){
    $obj->modificar();
}

if(isset($_POST['elimina'])){
    $obj->eliminar();
}

if(isset($_POST['limpia'])){
    $obj->limpiar();
}

?>