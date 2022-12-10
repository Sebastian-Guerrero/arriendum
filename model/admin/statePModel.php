<?php
    class StateP{
                  public $id_state_property;
                  public $name_state_property;

                    function agregar(){
                                        $conet = new Conexion();
                                        $c = $conet->conectando();
                                        $query = "SELECT * FROM state_property where name_state_property = '$this->name_state_property'";
                                        $ejecuta = mysqli_query($c, $query);
                                        if(mysqli_fetch_array($ejecuta)){
                                           echo "<script> alert('El Estado del Inmueble ya Existe en el Sistema')</script>";
                                        }else{
                                           $insertar = "INSERT INTO state_property VALUE(
                                                                                    '$this->id_state_property',
                                                                                    '$this->name_state_property'                            
                                           )";
                                           mysqli_query($c,$insertar);
                                           echo "<script> alert('El Estado de Inmueble fue Creado en el Sistema')</script>";
                                            
                                        }

                    }

                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "SELECT * FROM state_property WHERE name_state_property ='$this->name_state_property'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r))
                                         {
                                         echo "<script> alert('El Nombre del Estado de Inmueble que intenta Modificar ya Existe')</script>";
                                         }
                                         else
                                            {
                                            $id = "UPDATE state_property SET
                                                   name_state_property = '$this->name_state_property'
                                                   WHERE id_state_property = '$this->id_state_property'";
                                            mysqli_query($cone,$id);
                                            echo "<script> alert('El Nombre del Estado de Inmueble ha sido Modificado')</script>";				
                                               
                                         }

                    }   
                    
                    function eliminar(){
                                       $c = new Conexion();
                                       $cone = $c->conectando();
                                       $sql= "DELETE FROM state_property WHERE id_state_property ='$this->id_state_property'";
                                       if(mysqli_query($cone,$sql))
                                       {
                                       echo "<script> alert('El Estado de Inmueble fue Eliminado del Sistema);</script>";
                                       }
                                          else
                                             {
                                             echo"<script> alert('Atencion no se puede eliminar el Estado de Inmueble debido a que tiene datos relacionadas')</script>";
                                             }
                                    }

                    function limpiar(){

                    }
                  }
?>