<?php
    class Location{
                  public $id_Location_property;
                  public $name_location_property;

                    function agregar(){
                                        $conet = new Conexion();
                                        $c = $conet->conectando();
                                        $query = "SELECT * FROM location_property WHERE name_location_property = '$this->name_location_property'";
                                        $ejecuta = mysqli_query($c, $query);
                                        if(mysqli_fetch_array($ejecuta)){
                                           echo "<script> alert('La Localidad ya Existe en el Sistema')</script>";
                                        }else{
                                           $insertar = "INSERT INTO location_property VALUE(
                                                                                    '$this->id_Location_property',
                                                                                    '$this->name_location_property'                            
                                           )";
                                           mysqli_query($c,$insertar);
                                           echo "<script> alert('La Localidad fue Creada en el Sistema')</script>";
                                            
                                        }

                    }

                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "SELECT * FROM location_property WHERE id_location_property ='$this->id_location_property'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r))
                                         {
                                         echo "<script> alert('El Nombre de la Localidad que intenta Modificar ya Existe')</script>";
                                         }
                                         else
                                            {
                                            $id = "UPDATE location_property SET
                                                   name_location_property = '$this->name_location_property'
                                                   WHERE id_location_property = '$this->id_location_property'";
                                            mysqli_query($cone,$id);
                                            echo "<script> alert('La Localidad fue Modificada')</script>";				
                                               
                                         }

                    }   
                    
                    function eliminar(){
                                       $c = new Conexion();
                                       $cone = $c->conectando();
                                       $sql= "delete from location_property where id_location_property ='$this->id_location_property'";
                                       if(mysqli_query($cone,$sql))
                                       {
                                       echo "<script> alert('El resultado fue Eliminado del Sistema de Información');</script>";
                                       }
                                          else
                                             {
                                             echo"<script> alert('Atencion no se puede eliminar la Localidad debido a que tiene datos relacionadas')</script>";
                                             }
                                    }

                    function limpiar(){

                    }
                  }
?>