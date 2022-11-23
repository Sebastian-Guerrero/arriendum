<?php
    class Documento{
                  public $idDocumento;
                  public $nombreDocumento;

                    function agregar(){
                                        $conet = new Conexion();
                                        $c = $conet->conectando();
                                        $query = "select * from tipo_documento where nom_tipo_doc = '$this->nombreDocumento'";
                                        $ejecuta = mysqli_query($c, $query);
                                        if(mysqli_fetch_array($ejecuta)){
                                           echo "<script> alert('El Documento ya Existe en el Sistema')</script>";
                                        }else{
                                           $insertar = "insert into tipo_documento value(
                                                                                    '$this->idDocumento',
                                                                                    '$this->nombreDocumento'                            
                                           )";
                                           mysqli_query($c,$insertar);
                                           echo "<script> alert('El Documento fue Creado en el Sistema')</script>";
                                            
                                        }

                    }

                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "select * from tipo_documento where id_tipo_doc ='$this->idDocumento'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r))
                                         {
                                         echo "<script> alert('El resultado a Modificar ya existe')</script>";
                                         }
                                         else
                                            {
                                            $id = "update tipo_documento set
                                                   id_tipo_doc = '$this->idDocumento',
                                                   nom_tipo_doc = '$this->nombreDocumento'
                                                   where id_tipo_doc = '$this->idDocumento'";
                                            mysqli_query($cone,$id);
                                            echo "<script> alert('El resultado  fue Modificado ')</script>";				
                                               
                                         }

                    }   
                    
                    function eliminar(){
                                       $c = new Conexion();
                                       $cone = $c->conectando();
                                       $sql= "delete from tipo_documento where id_tipo_doc='$this->idDocumento'";
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