<?php
include('../../model/admin/documentModel.php');
$obj = new Document();
if($_POST){

    $obj->id_type_document = $_POST['id_type_document'];
    $obj->name_type_document = $_POST['name_type_document'];
    
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