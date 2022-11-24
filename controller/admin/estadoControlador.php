<?php
include('../../modelo/admin/estadoModelo.php');

$obj = new Estado();
if($_POST){

    $obj->idEstado = $_POST['idEstado'];
    $obj->nombreEstado = $_POST['nombreEstado'];

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