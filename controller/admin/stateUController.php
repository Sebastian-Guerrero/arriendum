<?php
include('../../model/admin/stateUModel.php');

$obj = new StateU();
if($_POST){

    $obj->id_state_user = $_POST['id_state_user'];
    $obj->name_state_user = $_POST['name_state_user'];

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