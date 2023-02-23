 <?php
    class Type{
                  public $id_type_property;
                  public $name_type_property;

                    function agregar(){
                                        $conet = new Conexion();
                                        $c = $conet->conectando();
                                        $query = "SELECT * FROM type_property where name_type_property = '$this->name_type_property'";
                                        $ejecuta = mysqli_query($c, $query);
                                        if(mysqli_fetch_array($ejecuta)){
                                           echo "<script> alert('El Tipo de Inmueble ya Existe en el Sistema')</script>";
                                        }else{
                                           $insertar = "INSERT INTO type_property VALUE(
                                                                                    '$this->id_type_property',
                                                                                    '$this->name_type_property'                            
                                           )";
                                           mysqli_query($c,$insertar);
                                           echo "<script> alert('El Tipo de Inmueble fue Creado en el Sistema')</script>";
                                            
                                        }

                    }

                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "SELECT * FROM type_property where id_type_property ='$this->id_type_property'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r))
                                         {
                                         echo "<script> alert('El Nombre del Tipo de Inmueble que intenta Modificar ya Existe')</script>";
                                         }
                                         else
                                            {
                                            $id = "UPDATE type_property SET
                                                   name_type_property = '$this->name_type_property'
                                                   WHERE id_type_property = '$this->id_type_property'";
                                            mysqli_query($cone,$id);
                                            echo "<script> alert('El Nombre del Tipo de Inmueble ha sido Modificado')</script>";				
                                               
                                         }

                    }   
                    
                    function eliminar(){
                                       $c = new Conexion();
                                       $cone = $c->conectando();
                                       $sql= "DELETE FROM type_property WHERE id_type_property='$this->id_type_property'";
                                       if(mysqli_query($cone,$sql))
                                       {
                                       echo "<script> alert('El Tipo de Inmueble fue Eliminado del Sistema de Información');</script>";
                                       }
                                          else
                                             {
                                             echo"<script> alert('Atencion no se puede eliminar el Tipo de Inmueble debido a que tiene datos relacionadas')</script>";
                                             }
                                    }

                    function limpiar(){

                    }
                  }
?>