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
						$conet = new Conexion();
						$c = $conet->conectando();
						$query = "SELECT * FROM user WHERE id_user = '$this->id_user'";
						$ejecuta = mysqli_query($c, $query);
						if(mysqli_fetch_array($ejecuta)){
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
						mysqli_query($c,$insertar);
						echo "<script> alert('Inmueble creado');</script>";
						}else{
							echo "<script> alert('El Usuario no existe en el sistema')</script>";
						}									
					}

				function modificar(){
								$c = new Conexion();
								$cone = $c->conectando();
								$sql = "SELECT * FROM property WHERE id_property ='$this->id_property'";
								$r = mysqli_query($cone,$sql);
								if(!mysqli_fetch_array($r)){
							echo "<script> alert('Ya Existe esta Modificacion del Inmueble')</script>";
							}else{
								$id = "UPDATE property SET
														state_property = '$this->state_property',
														direction_property = '$this->direction_property',
														type_property = '$this->type_property',
														option_property = '$this->option_property',
														location_property = '$this->location_property',
														neighborhood_property = '$this->neighborhood_property',
														information_property = '$this->information_property',
														description_property = '$this->description_property',
														cost_property = '$this->cost_property',
														update_property = '$this->update_property' 
														WHERE id_property = '$this->id_property'";
								mysqli_query($cone,$id);
								echo "<script> alert('El Inmueble ha sido Modificado')</script>";
							}
				 }

				function eliminar(){
								$c = new Conexion();
								$cone = $c->conectando();
								$sql= "DELETE FROM property WHERE id_property ='$this->id_property'";
								if(mysqli_query($cone,$sql))
								{
								echo "<script> alert('El Inmueble fue Eliminado del Sistema');</script>";
								}
								else
									{
									echo"<script> alert('Atencion no se puede eliminar el Registro debido a que tiene datos relacionadas')</script>";
									}
			    }
			}