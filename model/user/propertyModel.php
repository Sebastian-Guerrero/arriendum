<?php
	class Property{
				public $id_property;
				public $id_user;
				public $state_property;
				public $direction_property;
				public $type_property;
				public $option_property;
				public $location_property;
				public $neighborhood_property;
				public $information_property;
				public $description_property;
				public $cost_property;
				public $create_property;	
				public $update_property;	

                 function agregar(){
					$c = new Conexion();
					$cone = $c->conectando();
                    $insertar = "INSERT INTO property values('$this->id_property',
															'$this->id_user',
															'$this->state_property',
															'$this->direction_property',
                                                            '$this->type_property',
                                                            '$this->option_property',
                                                            '$this->location_property',
                                                            '$this->neighborhood_property',
															'$this->information_property',
															'$this->description_property',
															'$this->cost_property',
															'$this->create_property',
															'$this->update_property'
                    										)";    
					mysqli_query($cone,$insertar);	
					header("location: pub-gal.php");
					}									
				 				

				function modificar(){$c = new Conexion();
								$cone = $c->conectando();
								$sql = "select * from inmueble where id_inm ='$this->id_inm'";
								$r = mysqli_query($cone,$sql);
								if(!mysqli_fetch_array($r)){
							echo "<script> alert('El Usuario ha Modificado Inmueble')</script>";
							}else{
								$id = "update inmueble set
														id_inm = '$this->id_inm',
														estado_inm = '$this->estado_inm',
														direccion_inm = '$this->direccion_inm',
														tipo_inm = '$this->tipo_inm',
														opcion_inm = '$this->opcion_inm',
														localidad_inm = '$this->localidad_inm',
														barrio_inm = '$this->barrio_inm',
														inf_inm = '$this->inf_inm',
														desc_inm = '$this->desc_inm',
														precio_inm = '$this->precio_inm',
														fechaA_inm = '$this->fechaA_inm' 
														where id_inm = '$this->id_inm'";
								mysqli_query($cone,$id);
								echo "<script> alert('El Usuario Modifico un Inmueble ')</script>";
							}
				 }

				function eliminar(){
								$c = new Conexion();
								$cone = $c->conectando();
								$sql= "delete from inmueble where id_inm ='$this->id_inm'";
								if(mysqli_query($cone,$sql))
								{
								echo "<script> alert('El Inmueble fue Eliminado del Sistema');</script>";
								}
								else
									{
									echo"<script> alert('Atencion  no se puede eliminar el Registro debido a que tiene datos relacionadas')</script>";
									}
			    }
			}