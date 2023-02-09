<?php
    class Galery{
                  public $id_galery_property;
                  public $id_property;
                  public $name_galery_property;

                    function agregar(){
                                      $conet = new Conexion();
                                      $c = $conet->conectando();
                                      $ruta = '../../assets/img/inmuebles/'.$_FILES['name_galery_property']['name'];
									                    move_uploaded_file($_FILES['name_galery_property']['tmp_name'],$ruta);
                                      $insertar = "INSERT INTO galery_property VALUE(
                                                                              '$this->id_galery_property',
                                                                              '$this->id_property',
                                                                              '$ruta'                            
                                      )";
                                      mysqli_query($c,$insertar);
                                      echo "<script> alert('Imagen vinculada con el Inmueble')</script>"; 
                                      }

                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "SELECT * FROM galery_property where id_galery_property ='$this->id_galery_property'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r))
                                         {
                                         echo "<script> alert('El resultado a Modificar ya existe')</script>";
                                         }
                                         else{
                                             $ruta = '../../assets/img/inmuebles/'.$_FILES['name_galery_property']['name'];
									                            move_uploaded_file($_FILES['name_galery_property']['tmp_name'],$ruta);

                                             $id = "UPDATE galery_property SET
                                                                     name_galery_property = '$ruta'
                                                                     WHERE id_galery_property = '$this->id_galery_property'";
                                             mysqli_query($cone,$id);
                                             echo "<script> alert('Imagen Modificada')</script>";				
                                               
                                         }

                    }   
                    
                    function eliminar(){
                                       $c = new Conexion();
                                       $cone = $c->conectando();
                                       $sql= "DELETE FROM galery_property WHERE id_galery_property='$this->id_galery_property'";
                                       if(mysqli_query($cone,$sql))
                                       {
                                       echo "<script> alert('Imagen eliminada del inmueble');</script>";
                                       }
                                          else
                                             {
                                             echo"<script> alert('No se puede eliminar')</script>";
                                             }
                                    }

                    function limpiar(){

                    }
                  }
?>