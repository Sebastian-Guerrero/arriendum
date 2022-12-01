<?php
include('../../model/admin/rolModel.php');

$obj = new Rol();
if($_POST){

    $obj->id_rol_user = $_POST['id_rol_user'];
    $obj->name_rol_user = $_POST['name_rol_user'];
    
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