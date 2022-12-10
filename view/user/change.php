<?php

session_start();
$id_user = $_SESSION ['id_user'];
$name_user = $_SESSION['name_user'];
$lastname_user = $_SESSION['lastname_user'];


if (!isset($_SESSION['logueado']) || !$_SESSION['logueado']) {
  header("Location: ../guest/login.php");
}

    include "conectar.php";

if (isset($_POST['password_user'])  &&  isset($_POST['new_password'])
    && isset($_POST['verify_password'])){

    function validate($data){
        $data = trim ($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;     
    }

    $password_user = validate($_POST['password_user']);  
    $new_password  = validate ($_POST['new_password']);
    $verify_password = validate ($_POST['verify_password']);

   if(empty($password_user)){
    echo "<script> alert('Ingrese por favor su actual contraseña');window.location= 'index-user.php'   </script>";
   }else if(empty($new_password)){
    echo "<script> alert('Ingrese por favor su nueva contraseña');window.location= 'index-user.php'</script>";
   }else if($new_password !== $verify_password){
    echo "<script> alert('Los campos de cambiar contraseña no coinciden');window.location= 'index-user.php' </script>";
   }else{
        
        $password_user = md5($password_user);
        $new_password = md5 ($new_password);
        $id_user = $_SESSION['id_user'];

        $sql = "SELECT password_user FROM user WHERE id_user='$id_user' AND password_user='$password_user'";
        $result = mysqli_query($conexion,  $sql);
        if(mysqli_num_rows($result) === 1){ 
            
            $sql_2 = "UPDATE user SET password_user='$new_password' WHERE id_user='$id_user'";
            mysqli_query ($conexion, $sql_2);
            echo "<script> alert('Su contraseña ha sido cambiada satisfactoriamente');window.location= 'index-user.php' </script>";
        }else {
            echo "<script> alert('la contraseña que ingresaste en el primer campo es incorrecta, por favor vuelva a intentarlo');window.location= 'index-user.php' </script>";
        }
    }


}


?>