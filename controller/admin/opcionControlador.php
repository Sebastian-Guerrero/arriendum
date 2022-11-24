<?php
include('../../modelo/admin/opcionModelo.php');
$obj = new Opcion();
if($_POST){

    $obj->idOpcion = $_POST['idOpcion'];
    $obj->nombreOpcion = $_POST['nombreOpcion'];
    
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