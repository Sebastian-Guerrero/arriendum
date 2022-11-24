<?php
    class Rol{
                  public $idRol;
                  public $nombreRol;

                    function agregar(){
                                        $conet = new Conexion();
                                        $c = $conet->conectando();
                                        $query = "select * from rol where nom_rol = '$this->nombreRol'";
                                        $ejecuta = mysqli_query($c, $query);
                                        if(mysqli_fetch_array($ejecuta)){
                                           echo "<script> alert('El Rol ya Existe en el Sistema')</script>";
                                        }else{
                                           $insertar = "insert into rol value(
                                                                                    '$this->idRol',
                                                                                    '$this->nombreRol'                            
                                           )";
                                           mysqli_query($c,$insertar);
                                           echo "<script> alert('El Rol fue Creado en el Sistema')</script>";
                                            
                                        }

                    }

                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "select * from rol where id_tipo_doc ='$this->idRol'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r))
                                         {
                                         echo "<script> alert('El resultado a Modificar ya existe')</script>";
                                         }
                                         else
                                            {
                                            $id = "update rol set
                                                   id_rol = '$this->idRol',
                                                   nom_rol = '$this->nombreRol'
                                                   where id_rol = '$this->idRol'";
                                            mysqli_query($cone,$id);
                                            echo "<script> alert('El resultado  fue Modificado ')</script>";				
                                               
                                         }

                    }   
                    
                    function eliminar(){
                                       $c = new Conexion();
                                       $cone = $c->conectando();
                                       $sql= "delete from rol where id_rol ='$this->idRol'";
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