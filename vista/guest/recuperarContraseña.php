<?php
include("../../conectar2.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recuperar Contraseña</title>
    <link rel="stylesheet" href="../../config/css/estiloslogin.css">
</head>
<body>

    <div class="login-page">
        <div class="form">

        <form class="login-form" action="recuperarcontra.php" method="POST">
            <p class="name">Restablecer Cuenta</p>
            <p>Ingrese por favor el correo con el que se haya registrado</p>
            <br>
            <hr>
            <input type="email" placeholder="Email:" name="email_user" required/>
            <br>
            <button type="submit">Enviar</button>
            <br>
            <br>
            <a href="login.php"><button type="button">Cancelar</button></a>
            <p class="message">No te has registrado? <a href="singin.php">Crear Cuenta</a></p>
            <p class="message">¿Ya tienes cuenta? <a href="login.php">Inciar Sesion</a></p>
            </br>
        </form>
    </div>
    
</body>
</html>