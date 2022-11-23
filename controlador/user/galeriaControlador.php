<?php
include('../../modelo/user/galeriaModelo.php');

$obj = new Galeria();
if($_POST)
{
    $obj->id_galery_property = $_POST['id_galery_property'];
    $obj->id_property = $_POST['id_property'];
    $obj->name_galery_property = $_FILES['name_galery_property']['tmp_name'];
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