<?php
    class Localidad{
                  public $idLocalidad;
                  public $nombreLocalidad;

                    function agregar(){
                                        $conet = new Conexion();
                                        $c = $conet->conectando();
                                        $query = "select * from localidad_inmueble where nom_localidad_inm = '$this->nombreLocalidad'";
                                        $ejecuta = mysqli_query($c, $query);
                                        if(mysqli_fetch_array($ejecuta)){
                                           echo "<script> alert('La Localidad ya Existe en el Sistema')</script>";
                                        }else{
                                           $insertar = "insert into localidad_inmueble value(
                                                                                    '$this->idLocalidad',
                                                                                    '$this->nombreLocalidad'                            
                                           )";
                                           mysqli_query($c,$insertar);
                                           echo "<script> alert('La Localidad fue Creada en el Sistema')</script>";
                                            
                                        }

                    }

                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "select * from localidad_inmueble where id_localidad_inm ='$this->idLocalidad'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r))
                                         {
                                         echo "<script> alert('El resultado a Modificar ya existe')</script>";
                                         }
                                         else
                                            {
                                            $id = "update localidad_inmueble set
                                                   id_localidad_inm = '$this->idLocalidad',
                                                   nom_localidad_inm = '$this->nombreLocalidad'
                                                   where id_localidad_inm = '$this->idLocalidad'";
                                            mysqli_query($cone,$id);
                                            echo "<script> alert('El resultado fue Modificado ')</script>";				
                                               
                                         }

                    }   
                    
                    function eliminar(){
                                       $c = new Conexion();
                                       $cone = $c->conectando();
                                       $sql= "delete from localidad_inmueble where id_localidad_inm ='$this->idLocalidad'";
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