<?php
    class Opcion{
                  public $idOpcion;
                  public $nombreOpcion;

                    function agregar(){
                                        $conet = new Conexion();
                                        $c = $conet->conectando();
                                        $query = "select * from opcion_inmueble where nom_opcion_inm = '$this->nombreOpcion'";
                                        $ejecuta = mysqli_query($c, $query);
                                        if(mysqli_fetch_array($ejecuta)){
                                           echo "<script> alert('La Opcion de Inmueble ya Existe en el Sistema')</script>";
                                        }else{
                                           $insertar = "insert into opcion_inmueble value(
                                                                                    '$this->idOpcion',
                                                                                    '$this->nombreOpcion'                            
                                           )";
                                           mysqli_query($c,$insertar);
                                           echo "<script> alert('La Opcion de Inmueble fue Creada en el Sistema')</script>";
                                            
                                        }

                    }

                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "select * from opcion_inmueble where id_opcion_inm ='$this->idOpcion'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r))
                                         {
                                         echo "<script> alert('El resultado a Modificar ya existe')</script>";
                                         }
                                         else
                                            {
                                            $id = "update opcion_inmueble set
                                                   id_opcion_inm = '$this->idOpcion',
                                                   nom_opcion_inm = '$this->nombreOpcion'
                                                   where id_opcion_inm = '$this->idOpcion'";
                                            mysqli_query($cone,$id);
                                            echo "<script> alert('El resultado  fue Modificado ')</script>";				
                                               
                                         }

                    }   
                    
                    function eliminar(){
                                       $c = new Conexion();
                                       $cone = $c->conectando();
                                       $sql= "delete from opcion_inmueble where id_opcion_inm='$this->idOpcion'";
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