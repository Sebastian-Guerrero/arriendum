<?php
include('../../model/user/userModel.php');

$obj = new User();
if($_POST)
{
    $obj->id_user = $_POST['id_user'];
    $obj->state_user = $_POST['state_user'];
    $obj->rol_user = $_POST['rol_user'];
    $obj->type_document = $_POST['type_document'];
    $obj->name_user = $_POST['name_user'];
    $obj->lastname_user = $_POST['lastname_user'];
    $obj->phone_user = $_POST['phone_user'];
    $obj->email_user = $_POST['email_user'];
    $obj->password_user = $_POST['password_user'];
    $obj->verify_password = $_POST['verify_password'];
    $obj->create_user = $_POST['create_user'];
    $obj->update_user = $_POST['update_user'];

}

if(isset($_POST['guarda'])){
    if ($obj->password_user == $obj->verify_password) {
        $obj->password_user = password_hash($_POST['password_user'], PASSWORD_DEFAULT);
        $obj->agregar();
    }else {
        echo "<script> alert('No Coinciden las Contraseñas')</script>";
    }
   
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