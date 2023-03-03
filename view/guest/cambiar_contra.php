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

      <form class="login-form" action="../../connect/change_password.php" method="POST">

        <p class="name">Recupera tu contraseña</p>
        <hr>
        <p style="color:#00ADB5;">Escribe tu nueva contraseña por favor</p>
        <hr>
        <br>
        <input type="password" placeholder="Contraseña:" name="password_user" id="password_user" required/>
        <input type="hidden" name="id_user" value="<?php echo $_GET['id_user']; ?>">
        <div>
          <input style="margin-left:-245px" type="checkbox" onclick="verpassword()">
          <p class="contra">Mostrar Contraseña</p>
        </div>
        <br>   
        <br>
        <button type="submit">Cambiar contraseña</button>
        </br>
        <br>
      </form>
    </div>
  </div>
</body>
<script>
      function verpassword(){
          var tipo = document.getElementById("password_user");
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

</html>