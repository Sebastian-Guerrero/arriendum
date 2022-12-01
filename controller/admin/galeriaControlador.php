<?php
include('../../model/admin/galeriaModelo.php');

$obj = new Galeria();
if($_POST){

    $obj->idGaleria = $_POST['id_galery_property'];
    $obj->id_inm = $_POST['id_property'];
    $obj->nombreGaleria = $_FILES['name_galery_proerty']['tmp_name'];
}

if(isset($_POST['guarda'])){
    $obj->agregar();
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