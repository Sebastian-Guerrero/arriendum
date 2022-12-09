<?php
include('../../model/admin/usuarioModelo.php');
$obj = new Usuario();
if($_POST){

    $obj->numeroDocumento = $_POST['numeroDocumento'];
    $obj->rolUsuario = $_POST['rolUsuario'];
    $obj->tipoDocumento = $_POST['tipoDocumento'];
    $obj->nombreUsuario = $_POST['nombreUsuario'];
    $obj->apellidoUsuario = $_POST['apellidoUsuario'];
    $obj->emailUsuario = $_POST['emailUsuario'];
    $obj->contraUsuario = password_hash($_POST['contraUsuario'], PASSWORD_DEFAULT);
    $obj->celUsuario = $_POST['celUsuario'];
    $obj->fechaCUsuario = $_POST['fechaCUsuario'];
    $obj->fechaAUsuario = $_POST['fechaAUsuario'];

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