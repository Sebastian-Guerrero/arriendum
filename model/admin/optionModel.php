<?php
    class Option{
                  public $id_option_property;
                  public $name_option_property;

                    function agregar(){
                                        $conet = new Conexion();
                                        $c = $conet->conectando();
                                        $query = "SELECT * FROM option_property where name_option_property = '$this->name_option_property'";
                                        $ejecuta = mysqli_query($c, $query);
                                        if(mysqli_fetch_array($ejecuta)){
                                           echo "<script> alert('La Opcion de Inmueble ya Existe en el Sistema')</script>";
                                        }else{
                                           $insertar = "INSERT INTO option_property VALUE(
                                                                                    '$this->id_option_property',
                                                                                    '$this->name_option_property'                            
                                           )";
                                           mysqli_query($c,$insertar);
                                           echo "<script> alert('La Opcion de Inmueble fue Creada en el Sistema')</script>";
                                            
                                        }

                    }

                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "SELECT * FROM option_property WHERE id_option_property ='$this->id_option_property'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r))
                                         {
                                         echo "<script> alert('El Nombre de la Opcion que intenta Modificar ya Existe')</script>";
                                         }
                                         else
                                            {
                                            $id = "UPDATE option_property SET
                                                   name_option_property = '$this->name_option_property'
                                                   WHERE id_option_property = '$this->id_option_property'";
                                            mysqli_query($cone,$id);
                                            echo "<script> alert('La Opcion de Inmueble fue Modificada')</script>";				
                                         }
                    }   
                    
                    function eliminar(){
                                       $c = new Conexion();
                                       $cone = $c->conectando();
                                       $sql= "DELETE FROM option_property WHERE id_option_property='$this->id_option_property'";
                                       if(mysqli_query($cone,$sql))
                                       {
                                       echo "<script> alert('La Opcion de Inmueble fue Eliminada del Sistema');</script>";
                                       }
                                          else
                                             {
                                             echo"<script> alert('Atencion no se puede eliminar el Registro debido a que tiene datos relacionadas')</script>";
                                             }
                                    }

                    function limpiar(){

                    }
                  }
?>