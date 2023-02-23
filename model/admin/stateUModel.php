<?php
    class StateU{
                  public $id_state_user;
                  public $name_state_user;

                    function agregar(){
                                        $conet = new Conexion();
                                        $c = $conet->conectando();
                                        $query = "SELECT * FROM state_user where name_state_user = '$this->name_state_user'";
                                        $ejecuta = mysqli_query($c, $query);
                                        if(mysqli_fetch_array($ejecuta)){
                                           echo "<script> alert('El Estado de Usuario ya Existe en el Sistema')</script>";
                                        }else{
                                           $insertar = "INSERT INTO state_user VALUE(
                                                                                    '$this->id_state_user',
                                                                                    '$this->name_state_user'                            
                                           )";
                                           mysqli_query($c,$insertar);
                                           echo "<script> alert('El Estado de Usuario fue Creado en el Sistema')</script>";
                                            
                                        }

                    }

                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "SELECT * FROM state_user WHERE id_state_user ='$this->id_state_user'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r))
                                         {
                                         echo "<script> alert('El Nombre del Estado de Usuario que intenta Modificar ya Existe')</script>";
                                         }
                                         else
                                            {
                                            $id = "UPDATE state_user SET
                                                   name_state_user = '$this->name_state_user'
                                                   WHERE id_state_user = '$this->id_state_user'";
                                            mysqli_query($cone,$id);
                                            echo "<script> alert('El Nombre del Estado de Usuario ha sido Modificado')</script>";				
                                               
                                         }

                    }   
                    
                    function eliminar(){
                                       $c = new Conexion();
                                       $cone = $c->conectando();
                                       $sql= "DELETE FROM state_user WHERE id_state_user ='$this->id_state_user'";
                                       if(mysqli_query($cone,$sql))
                                       {
                                       echo "<script> alert('El Estado de Usuario fue Eliminado del Sistema');</script>";
                                       }
                                          else
                                             {
                                             echo"<script> alert('Atencion no se puede eliminar el Estado de Usuario debido a que tiene datos relacionadas')'</script>";
                                             }
                                    }

                    function limpiar(){

                    }
                  }
?>