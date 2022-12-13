<?php
    class User{
                public $id_user;
                public $password_user;
                public $create_user;
                public $update_user;
                                    
                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "select * from user where id_user ='$this->id_user'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r)){
                                         echo "<script> alert('El usuario no existe')</script>";
                                         }else{
                                           $id = "update user set  
                                                                  password_user = '$this->password_user',
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