<?php
include('../../model/admin/optionModel.php');

$obj = new Option();
if($_POST){

    $obj->id_option_property = $_POST['id_option_property'];
    $obj->name_option_property = $_POST['name_option_property'];
    
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