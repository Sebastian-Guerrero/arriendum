<?php
    class Usuario{
                public $numeroDocumento;
                public $rolUsuario;
                public $tipoDocumento;
                public $nombreUsuario;
                public $apellidoUsuario;
                public $emailUsuario;
                public $contraUsuario;
                public $celUsuario;
                public $fechaCUsuario;
                public $fechaAUsuario;

                    function agregar(){
                                        $conet = new Conexion();
                                        $c = $conet->conectando();
                                        $query = "select * from usuario where num_id_usuario = '$this->numeroDocumento'";
                                        $ejecuta = mysqli_query($c, $query);
                                        if(mysqli_fetch_array($ejecuta)){
                                           echo "<script> alert('El Usuario ya Existe en el Sistema')</script>";
                                        }else{
                                           $insertar = "insert into usuario value(
                                                                                    '$this->numeroDocumento',
                                                                                    '$this->rolUsuario',
                                                                                    '$this->tipoDocumento',
                                                                                    '$this->nombreUsuario',
                                                                                    '$this->apellidoUsuario',
                                                                                    '$this->celUsuario',
                                                                                    '$this->emailUsuario',
                                                                                    '$this->contraUsuario',                                                                                   
                                                                                    '$this->fechaCUsuario',
                                                                                    '$this->fechaAUsuario'                           
                                           )";
                                           mysqli_query($c,$insertar);
                                           echo "<script> alert('Nuevo Usuario Creado en el Sistema')</script>";
                                        }

                                       }

                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "select * from usuario where num_id_usuario ='$this->numeroDocumento'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r)){
                                         echo "<script> alert('El Usuario no Existe en el Sistema')</script>";
                                         }else{
                                           $encriptarpassword = password_hash($this->contraUsuario, PASSWORD_DEFAULT);
                                           $id = "update usuario set
                                                                  num_id_usuario = '$this->numeroDocumento',
                                                                  rol_usuario = '$this->rolUsuario',
                                                                  id_tipo_doc = '$this->tipoDocumento',
                                                                  nombre_usuario = '$this->nombreUsuario',
                                                                  apellido_usuario = '$this->apellidoUsuario',
                                                                  celular_usuario = '$this->celUsuario',
                                                                  email_usuario = '$this->emailUsuario',
                                                                  contrasena_usuario = '$encriptarpassword',
                                                                  fechaA_usuario = '$this->fechaAUsuario' 
                                                                  where num_id_usuario = '$this->numeroDocumento'";
                                            echo $id;
                                            mysqli_query($cone,$id);
                                            echo "<script> alert('El Usuario fue Modificado ')</script>";
                                         }
                                       }
   
                    function eliminar(){
                                       $c = new Conexion();
                                       $cone = $c->conectando();
                                       $sql= "delete from usuario where num_id_usuario='$this->numeroDocumento'";
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