<?php
include('../../model/user/userchangepassword.php');

$obj = new User();
if($_POST)
{
    $obj->id_user = $_POST['id_user'];
    $obj->password_user = $_POST['password_user'];
    $obj->verify_password = $_POST['verify_password'];
    $obj->update_user = $_POST['update_user'];

}

if(isset($_POST['guarda'])){


}

if(isset($_POST['modifica_password'])){
    if ($obj->password_user =! $obj->password_user){
        echo "Error no se ha podido actualizar sus datos";
    }else{
        $obj->password_user = password_hash($_POST['password_user'], PASSWORD_DEFAULT);
        $obj->modificar();
    }
}
if(isset($_POST['elimina'])){
    $obj->eliminar();
}

if(isset($_POST['limpia'])){
    $obj->limpiar();
}

?>
