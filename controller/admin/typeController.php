<?php
include('../../model/admin/typeModel.php');

$obj = new Type();
if($_POST){

    $obj->id_type_property = $_POST['id_type_property'];
    $obj->name_type_property = $_POST['name_type_property'];
    
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