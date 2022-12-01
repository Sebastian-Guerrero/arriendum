<?php
    class Rol{
               public $id_rol_user;
               public $name_rol_user;

                    function agregar(){
                                        $conet = new Conexion();
                                        $c = $conet->conectando();
                                        $query = "SELECT * FROM rol_user where name_rol_user = '$this->name_rol_user'";
                                        $ejecuta = mysqli_query($c, $query);
                                        if(mysqli_fetch_array($ejecuta)){
                                           echo "<script> alert('El Rol de Usuario ya Existe en el Sistema')</script>";
                                        }else{
                                          $insertar = "INSERT INTO rol_user VALUE(
                                                                                 '$this->id_rol_user',
                                                                                 '$this->name_rol_user'                            
                                           )";
                                           mysqli_query($c,$insertar);
                                           echo "<script> alert('El Rol de Usuario fue Creado en el Sistema')</script>";
                                            
                                        }

                    }

                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "SELECT * FROM rol_user WHERE name_rol_user ='$this->name_rol_user'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r))
                                         {
                                         echo "<script> alert('El Nombre del Rol que intenta Modificar ya Existe')</script>";
                                         }
                                         else
                                            {
                                            $id = "UPDATE rol_user SET
                                                                     name_rol_user = '$this->name_rol_user'
                                                                     WHERE id_rol_user = '$this->id_rol_user'";
                                            mysqli_query($cone,$id);
                                            echo "<script> alert('El nombre del rol ha sido modificado')</script>";				
                                               
                                         }

                    }   
                    
                    function eliminar(){
                                       $c = new Conexion();
                                       $cone = $c->conectando();
                                       $sql= "DELETE FROM rol_user where id_rol_user ='$this->id_rol_user'";
                                       if(mysqli_query($cone,$sql))
                                       {
                                       echo "<script> alert('El Rol ha sido Eliminado del Sistema');</script>";
                                       }
                                          else
                                             {
                                             echo"<script> alert('Atencion no se puede eliminar el Rol debido a que tiene datos relacionadas')</script>";
                                             }
                                    }

                    function limpiar(){

                    }
                  }
?>