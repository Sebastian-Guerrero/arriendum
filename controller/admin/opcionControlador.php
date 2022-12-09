<?php
include('../../model/admin/opcionModelo.php');
$obj = new Opcion();
if($_POST){

    $obj->idOpcion = $_POST['id_option_property'];
    $obj->nombreOpcion = $_POST['name_option_property'];
    
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