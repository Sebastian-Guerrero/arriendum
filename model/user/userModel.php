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
                                             echo "<script> alert('Bienvenido $this->name_user');window.location='../../view/guest/login.php'</script>";
                                             //header("location:../../vista/user/login.php");
                                          }
                                          
                                        }
                                       

                  function modificar(){$c = new Conexion();
                                        $cone = $c->conectando();
                                        $sql = "select * from user where id_user ='$this->id_user'";
                                        $r = mysqli_query($cone,$sql);
                                        if(!mysqli_fetch_array($r)){
                                        echo "<script> alert('El Usuario no Existe en el Sistema')</script>";
                                        }else{
                                          $id = "update user set
                                                                type_document = '$this->type_document',
                                                                name_user = '$this->name_user',
                                                                lastname_user = '$this->lastname_user',
                                                                phone_user = '$this->phone_user',
                                                                email_user = '$this->email_user',
                                                                update_user = '$this->update_user' 
                                                                where id_user = '$this->id_user'";
                                          echo $id;
                                          mysqli_query($cone,$id);
                                          echo "<script> alert('El Usuario fue Modificado ')</script>";
                                        }
                                      }

   
                    function eliminar(){
     
                                       }

                    function limpiar(){

                    }
                  }
?>