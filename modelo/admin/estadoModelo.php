<?php
    class Estado{
                  public $idEstado;
                  public $nombreEstado;

                    function agregar(){
                                        $conet = new Conexion();
                                        $c = $conet->conectando();
                                        $query = "select * from estado_inmueble where nom_estado_inm = '$this->nombreEstado'";
                                        $ejecuta = mysqli_query($c, $query);
                                        if(mysqli_fetch_array($ejecuta)){
                                           echo "<script> alert('El Estado ya Existe en el Sistema')</script>";
                                        }else{
                                           $insertar = "insert into estado_inmueble value(
                                                                                    '$this->idEstado',
                                                                                    '$this->nombreEstado'                            
                                           )";
                                           mysqli_query($c,$insertar);
                                           echo "<script> alert('El Estado fue Creado en el Sistema')</script>";
                                            
                                        }

                    }

                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "select * from estado_inmueble where id_estado_inm ='$this->idEstado'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r))
                                         {
                                         echo "<script> alert('El resultado a Modificar ya existe')</script>";
                                         }
                                         else
                                            {
                                            $id = "update estado_inmueble set
                                                   id_estado_inm = '$this->idEstado',
                                                   nom_estado_inm = '$this->nombreEstado'
                                                   where id_estado_inm = '$this->idEstado'";
                                            mysqli_query($cone,$id);
                                            echo "<script> alert('El resultado fue Modificado ')</script>";				
                                               
                                         }

                    }   
                    
                    function eliminar(){
                                       $c = new Conexion();
                                       $cone = $c->conectando();
                                       $sql= "delete from estado_inmueble where id_estado_inm ='$this->idEstado'";
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