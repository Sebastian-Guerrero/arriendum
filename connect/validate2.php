<?php
include("conectar.php");

session_start();
$id_user = $_SESSION ['id_user'];
$password_user = $_POST["password_user"];

$conet = new Conexion();
$c = $conet->conectando();

$query = "SELECT * FROM user WHERE id_user = '$id_user'";
$result = mysqli_query($c, $query);
$fila = mysqli_fetch_array($result);

if($id_user = $_SESSION ['id_user']&&(password_verify($password_user, $fila ["password_user"])))
{
    echo "<script> alert('Contraseña Correcta');window.location= '../view/user/updateuser.php'</script>";  
}
else
{
    echo "<script> alert('Contraseña incorrecta, vuelva a intentarlo');window.location= '../view/user/index-user.php' </script>";

}
?>