<?php
include('../../modelo/admin/galeriaModelo.php');

$obj = new Galeria();
if($_POST){

    $obj->idGaleria = $_POST['idGaleria'];
    $obj->id_inm = $_POST['id_inm'];
    $obj->nombreGaleria = $_FILES['nombreGaleria']['tmp_name'];
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