<?php
include('../../model/admin/estadoModelo.php');

$obj = new Estado();
if($_POST){

    $obj->idEstado = $_POST['id_state_property'];
    $obj->nombreEstado = $_POST['name_state_property'];

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