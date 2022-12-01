<?php
include('../../model/admin/localidadModelo.php');

$obj = new Location();
if($_POST){

    $obj->idLocalidad = $_POST['idLocalidad'];
    $obj->nombreLocalidad = $_POST['nombreLocalidad'];

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