<?php
    class User{
               public $id_user;
               public $state_user;
               public $rol_user;
               public $type_document;
               public $name_user;
               public $lastname_user;
               public $phone_user;
               public $email_user;
               public $password_user;
               public $create_user;
               public $update_user;

               function agregar(){
                  $conet = new Conexion();
                  $c = $conet->conectando();
                  $query = "SELECT * FROM user WHERE id_user = '$this->id_user'";
                  $ejecuta = mysqli_query($c, $query);
                  if(mysqli_fetch_array($ejecuta)){
                    echo "<script> alert('El Usuario Identificado con $this->id_user ya Existe en el Sistema')</script>";
                  }else{
                       $insertar = "INSERT INTO user VALUE(
                                                            '$this->id_user',
                                                            '$this->state_user',
                                                            '$this->rol_user',
                                                            '$this->type_document',
                                                            '$this->name_user',
                                                            '$this->lastname_user',
                                                            '$this->phone_user',
                                                            '$this->email_user',
                                                            '$this->password_user',                                                                                   
                                                            '$this->create_user',
                                                            '$this->update_user'                           
                                                          )";
                       mysqli_query($c,$insertar);
                       echo "<script> alert('Nuevo usuario creado en el sistema')'</script>";
                    }
                    
                  }

                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "SELECT * FROM user WHERE id_user = '$this->id_user'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r)){
                                         echo "<script> alert('El Usuario no Existe en el Sistema')</script>";
                                         }else{
                                           $id = "UPDATE user SET
                                                                  num_id_usuario = '$this->numeroDocumento',
                                                                  rol_usuario = '$this->rolUsuario',
                                                                  id_tipo_doc = '$this->tipoDocumento',
                                                                  nombre_usuario = '$this->nombreUsuario',
                                                                  apellido_usuario = '$this->apellidoUsuario',
                                                                  celular_usuario = '$this->celUsuario',
                                                                  email_usuario = '$this->emailUsuario',
                                                                  contrasena_usuario = '$encriptarpassword',
                                                                  fechaA_usuario = '$this->fechaAUsuario' 
                                                                  WHERE num_id_usuario = '$this->numeroDocumento'";
                                            echo $id;
                                            mysqli_query($cone,$id);
                                            echo "<script> alert('El Usuario fue Modificado ')</script>";
                                         }
                                       }
   
                    function eliminar(){
                                       $c = new Conexion();
                                       $cone = $c->conectando();
                                       $sql= "DELETE FROM user WHERE id_user = '$this->id_user'";
                                       if(mysqli_query($cone,$sql))
                                       {
                                       echo "<script> alert('El Usuario fue Eliminado del Sistema');</script>";
                                       }
                                          else
                                             {
                                             echo"<script> alert('Atencion no se puede eliminar al Usuario debido a que tiene datos relacionadas')</script>";
                                             }
                                       }

                    function limpiar(){

                    }
                  }
?>