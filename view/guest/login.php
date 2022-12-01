<!doctype html>
<html lang="es">

  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="../../config/css/estiloslogin.css">

    <title>Iniciar Sesion</title>

</head>

<body>

  <nav>
      <img class="logo" src="../../assets/icons/logo.png">
        <ul>
          <li><button class="ba" type="button"><a href="../../index.php">INICIO</a></button></li>
          <li><button class="ba" type="button"><a href="product.php">INMUEBLES</button></li>
          <li><button class="bb" type="button"><a href="singin.php">REGISTRATE</a></button></li>
        </ul>
    </nav>

  <div class="login-page">
    <div class="form">

      <form class="login-form" action="../../connect/validate.php" method="POST">

        <p class="name">Iniciar Sesion</p>

        <hr>

        <input type="email" placeholder="Email:" name="email_user" required/>

        <input type="password" placeholder="Contraseña:" name="password_user" id="contraseña" required/>
        <div>
          <input style="margin-left:-245px" type="checkbox" onclick="verpassword()">
          <p class="contra">Mostrar Contraseña</p>
        <div>
        <br>
        <button type="submit">Ingresar</button>
        <p class="message">No te has registrado? <a href="singin.php">Crear Cuenta</a></p>
        <p class="message">Has olvidado tu contraseña? <a href="recuperarContraseña.php">Recuperar contraseña</a></p>
        </br>
 
      </form>

    </div>
  </div>
  <script>
      function verpassword(){
          var tipo = document.getElementById("contraseña");
          if(tipo.type == "password")
        {
              tipo.type = "text";
          }
        else
        {
              tipo.type = "password";
          }
      }
  </script>
<script src="../../config/js/java.js"></script>
</body>

</html>


