<?php
include('../../model/admin/tipoModelo.php');
$obj = new Tipo();
if($_POST){

    $obj->idTipo = $_POST['id_type_property'];
    $obj->nombreTipo = $_POST['name_type_property'];
    
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