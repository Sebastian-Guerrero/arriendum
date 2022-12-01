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
                                      $insertar = "INSERT INTO galery VALUE(
                                                                              '$this->id_galery_property',
                                                                              '$this->id_property',
                                                                              '$ruta'                            
                                      )";
                                      mysqli_query($c,$insertar);
                                      echo "<script> alert('Foto vinculada con el Inmueble')</script>"; 
                                      }

                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "SELECT * FROM galery where name_galery_property ='$this->name_galery_property'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r))
                                         {
                                         echo "<script> alert('El resultado a Modificar ya existe')</script>";
                                         }
                                         else{
                                             $ruta = '../../assets/img/inmuebles/'.$_FILES['name_galery_property']['name'];
									                            move_uploaded_file($_FILES['name_galery_property']['tmp_name'],$ruta);

                                             $id = "UPDATE galery SET
                                                                     id_galeria = '$id_galery_property->id_galery_property',
                                                                     nom_galeria = '$ruta'
                                                                     WHERE id_galeria = '$this->id_galery_property'";
                                             mysqli_query($cone,$id);
                                             echo "<script> alert('Foto Modificada')</script>";				
                                               
                                         }

                    }   
                    
                    function eliminar(){
                                       $c = new Conexion();
                                       $cone = $c->conectando();
                                       $sql= "DELETE FROM galery WHERE id_galery_property='$this->id_galery_property'";
                                       if(mysqli_query($cone,$sql))
                                       {
                                       echo "<script> alert('Foto eliminada de la propiedad');</script>";
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