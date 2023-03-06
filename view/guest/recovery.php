<!doctype html>
<html lang="es">

  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="../../config/css/estiloslogin.css">

    <title>Recuperar contraseña</title>

</head>

<body>

    <nav>
      <img class="logo" src="../../assets/icons/logo.png">
    </nav>

  <div class="login-page">
    <div class="form">

      <form class="login-form" action="../../connect/recovery.php" method="POST">

        <p class="name">Recuperar contraseña</p>
        <hr>
        <p style="color:#00ADB5;">Ingresa por favor tu correo electronico</p>
        <hr>
        <input type="email" placeholder="Email:" name="email_user" required/>
        <br>
        <button type="submit">Enviar</button>
        </br>
        <br>
        <a style="margin-left:9px" class="olvide_contra" href="../../index.php">Volver al inicio...</a>
      </form>
      

    </div>
  </div>
</body>

</html>