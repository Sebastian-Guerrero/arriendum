 <?php
    class Tipo{
                  public $idTipo;
                  public $nombreTipo;

                    function agregar(){
                                        $conet = new Conexion();
                                        $c = $conet->conectando();
                                        $query = "select * from tipo_inmueble where nom_tipo_inm = '$this->nombreTipo'";
                                        $ejecuta = mysqli_query($c, $query);
                                        if(mysqli_fetch_array($ejecuta)){
                                           echo "<script> alert('El Tipo de Inmueble ya Existe en el Sistema')</script>";
                                        }else{
                                           $insertar = "insert into tipo_inmueble value(
                                                                                    '$this->idTipo',
                                                                                    '$this->nombreTipo'                            
                                           )";
                                           mysqli_query($c,$insertar);
                                           echo "<script> alert('El Tipo de Inmueble fue Creado en el Sistema')</script>";
                                            
                                        }

                    }

                    function modificar(){$c = new Conexion();
                                          $cone = $c->conectando();
                                          $sql = "select * from tipo_inmueble where id_tipo_inm ='$this->idTipo'";
                                          $r = mysqli_query($cone,$sql);
                                          if(!mysqli_fetch_array($r))
                                         {
                                         echo "<script> alert('El resultado a Modificar ya existe')</script>";
                                         }
                                         else
                                            {
                                            $id = "update tipo_inmueble set
                                                   id_tipo_inm = '$this->idTipo',
                                                   nom_tipo_inm = '$this->nombreTipo'
                                                   where id_tipo_inm = '$this->idTipo'";
                                            mysqli_query($cone,$id);
                                            echo "<script> alert('El resultado  fue Modificado ')</script>";				
                                               
                                         }

                    }   
                    
                    function eliminar(){
                                       $c = new Conexion();
                                       $cone = $c->conectando();
                                       $sql= "delete from tipo_inmueble where id_tipo_inm='$this->idTipo'";
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