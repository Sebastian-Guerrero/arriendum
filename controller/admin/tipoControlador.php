<?php
include('../../modelo/admin/tipoModelo.php');
$obj = new Tipo();
if($_POST){

    $obj->idTipo = $_POST['idTipo'];
    $obj->nombreTipo = $_POST['nombreTipo'];
    
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