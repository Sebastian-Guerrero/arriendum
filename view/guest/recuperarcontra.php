<?php

include("../../conectar2.php");

$email_user = $_POST ['email_user'];

$queryusuario = mysqli_query($conn,"SELECT * FROM user WHERE email_user = '$email_user'");
$nr           = mysqli_num_rows($queryusuario);
if ($nr==1)
{
$mostrar = mysqli_fetch_array($queryusuario);
$enviarpass = $mostrar ['password_user'];

$paracorreo = $email_user;
$titulo = "Recuperar contraseña";
$mensaje = "Tu contraseña es: ".$enviarpass;
$tucorreo = "From: xxxxx@gmail.com";

if(mail($paracorreo,$titulo,$mensaje,$tucorreo))
{
    echo "<script> alert('Contraseña enviada');window.Location= '../../index.php' </script>";

}else
{
    echo "<script> alert('Error');window.Location= '../../index.php' </script>";
}
}
else
{
    echo "<script> alert('Este correo no existe');window.location= '../../index.php' </script>";
}
?>


