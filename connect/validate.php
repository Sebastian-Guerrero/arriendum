<?php
include("conectar.php");

$email_user = $_POST['email_user'];
$password_user = $_POST['password_user'];

$conet = new Conexion();
$c = $conet->conectando();

$query = "SELECT * FROM user WHERE email_user = '$email_user'";
$result = mysqli_query($c, $query);
$fila = mysqli_fetch_array($result);

$id_user = $fila['id_user'];
$name_user = $fila['name_user'];
$lastname_user = $fila['lastname_user'];

session_start();

$_SESSION['id_user'] = $id_user;
$_SESSION['name_user'] = $name_user;
$_SESSION['lastname_user'] = $lastname_user;

if (($fila['rol_user']==1)&&(password_verify($password_user, $fila['password_user']))) 
{
    $_SESSION['logueado'] = true;
    header("location: ../vista/admin/index-admin.php");
}
elseif (($fila['rol_user']==2)&&(password_verify($password_user, $fila['password_user']))) 
{
    $_SESSION['logueado'] = true;
    header("location: ../vista/user/index-user.php");
}
else 
{
    $_SESSION['logueado'] = false;
    echo "<script> alert('Atencion, correo electronico o contraseña incorrectos, por favor vuelva intentarlo.');window.location= '../vista/guest/login.php' </script>";

    
}

mysqli_free_result($query);
mysqli_close($c);
?>