<?php
include('../../model/admin/statePModel.php');

$obj = new StateP();
if($_POST){

    $obj->id_state_property = $_POST['id_state_property'];
    $obj->name_state_property = $_POST['name_state_property'];

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