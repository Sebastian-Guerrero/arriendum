<?php
include("../../connect/conectar.php");

$id_galery_property = $_POST['id_galery_property'];
$id_property = $_POST['id_property'];

if(isset($_POST['guarda'])){
    foreach ($_FILES['imagenes']['tmp_name'] as $key => $value) {

            $random = rand(999999,999999999999);
            $ruta = "../../assets/img/inmuebles/".$random. ".jpg";

        if (file_exists($_FILES['imagenes']['tmp_name'][$key])) {
          if (move_uploaded_file($_FILES['imagenes']['tmp_name'][$key], $ruta)) {
            
            $conet = new Conexion();
            $c = $conet->conectando();
            
            $insertar = "INSERT INTO galery_property VALUES (
              '$id_galery_property',
              '$id_property',
              '$ruta'
            )";
            mysqli_query($c,$insertar);
            echo "<script> alert('Ha realizado una Publicacion');window.location='../../view/user/product.php' </script>";
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