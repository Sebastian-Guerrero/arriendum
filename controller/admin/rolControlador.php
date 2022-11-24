<?php
include('../../modelo/admin/rolModelo.php');
$obj = new Rol();
if($_POST){

    $obj->idRol = $_POST['idRol'];
    $obj->nombreRol = $_POST['nombreRol'];
    
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