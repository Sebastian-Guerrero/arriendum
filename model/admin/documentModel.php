<?php
    class Document{
                  public $id_type_document;
                  public $name_type_document;

                    function agregar(){
                                        $conet = new Conexion();
                                        $c = $conet->conectando();

                                        $query = "SELECT * FROM type_document where name_type_document = '$this->name_type_document'";
                                        $ejecuta = mysqli_query($c, $query);
                                        if(mysqli_fetch_array($ejecuta)){
                                           echo "<script> alert('El Tipo de Documento ya Existe en el Sistema')</script>";
                                        }else{
                                           $insertar = "INSERT INTO type_document VALUE(
                                                                                    '$this->id_type_document',
                                                                                    '$this->name_type_document'                            
                                           )";
                                           mysqli_query($c,$insertar);
                                           echo "<script> alert('El Tipo de Documento fue Creado en el Sistema')</script>";
                                            
                                        }

                    }

                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "SELECT * FROM type_document WHERE id_type_document ='$this->name_type_document'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r))
                                         {
                                         echo "<script> alert('El Tipo de Documento a Modificar ya existe')</script>";
                                         }
                                         else
                                            {
                                            $id = "UPDATE tipo_documento SET
                                                   id_type_document = '$this->id_type_document',
                                                   nom_tipo_doc = '$this->name_type_document'
                                                   WHERE id_type_document = '$this->id_type_document'";
                                            mysqli_query($cone,$id);
                                            echo "<script> alert('El Tipo de Documento fue Modificado ')</script>";				
                                               
                                         }

                    }   
                    
                    function eliminar(){
                                       $c = new Conexion();
                                       $cone = $c->conectando();
                                       $sql= "DELETE FROM type_document WHERE id_type_document='$this->id_type_document'";
                                       if(mysqli_query($cone,$sql))
                                       {
                                       echo "<script> alert('El Tipo de Documento fue Eliminado del Sistema');</script>";
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