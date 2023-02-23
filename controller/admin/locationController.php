<?php
include('../../model/admin/locationModel.php');

$obj = new Location();
if($_POST){

    $obj->id_location_property = $_POST['id_location_property'];
    $obj->name_location_property = $_POST['name_location_property'];

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