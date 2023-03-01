<?php

require_once('conectar1.php');
$id_user = $_POST['id_user'];
$password_user = $_POST['password_user'];
$passwordencript = password_hash($password_user, PASSWORD_DEFAULT);

$query="update user set password_user = '$passwordencript' where id_user = $id_user";
$conexion->query($query);

echo "<script> alert('Se ha actualizado su contraseña, por favor ingrese nuevamente a la pagina');window.location='../view/guest/login.php'</script>";


?>