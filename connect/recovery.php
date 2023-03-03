<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';


require_once('conectar1.php');
$email_user = $_POST['email_user']; 
$query="SELECT * FROM user WHERE email_user = '$email_user'";
$result = $conexion->query($query);
$row = $result->fetch_assoc();
 
if($result->num_rows > 0){

    $mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'arriendum@gmail.com';                     
    $mail->Password   = 'fgmxjkgnruyjyhlj';                               
    $mail->Port       = 587;                                    

    $mail->setFrom('arriendum@gmail.com', 'Arriendum');
    $mail->addAddress($email_user, 'Cliente Arriendum');      
    $mail->isHTML(true);                                  
    $mail->Subject = 'Recuperar clave';
    $mail->Body    = 'Hola, este es un correo generado para solicitar tu recuperación de contraseña, por favor, visita la página de <a href="http://localhost:8080/arriendum/view/guest/cambiar_contra.php?id_user='.$row['id_user'].'">Recuperación de contraseña</a>';
    
    
    $mail->send();
    echo "<script> alert('Se ha enviado un mensaje a su correo');window.location='../index.php'</script>";
} catch (Exception $e) {
    echo "<script> alert('Ha salido un error');window.location='../index.php'</script>";
}
}else{
    echo "<script> alert('Este correo no esta registrado en la pagina');window.location='../index.php'</script>";
}

?>