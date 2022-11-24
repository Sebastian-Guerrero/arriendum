<?php
include('../../modelo/admin/documentoModelo.php');
$obj = new Documento();
if($_POST){

    $obj->idDocumento = $_POST['idDocumento'];
    $obj->nombreDocumento = $_POST['nombreDocumento'];
    
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