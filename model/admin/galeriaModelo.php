<?php
    class Galeria{
                  public $idGaleria;
                  public $id_inm;
                  public $nombreGaleria;

                    function agregar(){
                                      $conet = new Conexion();
                                      $c = $conet->conectando();
                                      $ruta = '../../assets/img/inmuebles/'.$_FILES['nombreGaleria']['name'];
									                    move_uploaded_file($_FILES['nombreGaleria']['tmp_name'],$ruta);
                                      $insertar = "insert into galeria value(
                                                                              '$this->idGaleria',
                                                                              '$this->id_inm',
                                                                              '$ruta'                            
                                      )";
                                      mysqli_query($c,$insertar);
                                      echo "<script> alert('Fue Creado en el Sistema')</script>"; 
                                      }

                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "select * from galeria where id_galeria ='$this->idGaleria'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r))
                                         {
                                         echo "<script> alert('El resultado a Modificar ya existe')</script>";
                                         }
                                         else{
                                             $ruta = '../../assets/img/inmuebles/'.$_FILES['nombreGaleria']['name'];
									                  move_uploaded_file($_FILES['nombreGaleria']['tmp_name'],$ruta);

                                             $id = "update galeria set
                                                                     id_galeria = '$this->idGaleria',
                                                                     nom_galeria = '$ruta'
                                                                     where id_galeria = '$this->idGaleria'";
                                             mysqli_query($cone,$id);
                                             echo "<script> alert('El resultado  fue Modificado ')</script>";				
                                               
                                         }

                    }   
                    
                    function eliminar(){
                                       $c = new Conexion();
                                       $cone = $c->conectando();
                                       $sql= "delete from galeria where id_galeria='$this->idGaleria'";
                                       if(mysqli_query($cone,$sql))
                                       {
                                       echo "<script> alert('El resultado fue Eliminado del Sistema de Información');</script>";
                                       }
                                          else
                                             {
                                             echo"<script> alert('Atencion  no se puede eliminar el Registro debido a que tiene datos relacionadas')</script>";
                                             }
                                    }

                    function limpiar(){

                    }
                  }
?>