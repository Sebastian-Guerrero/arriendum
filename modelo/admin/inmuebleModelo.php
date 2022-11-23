<?php
	class Inmueble{

		public $id_inm;
		public $id_usuario;
		public $estado_inm;
		public $direccion_inm;
		public $tipo_inm;
		public $opcion_inm;
        public $localidad_inm;
        public $barrio_inm;
		public $inf_inm;
		public $desc_inm;
        public $precio_inm;
		public $fechaC_inm;	
		public $fechaA_inm;	

                 function agregar(){
					$c = new Conexion();
					$cone = $c->conectando();
                    $insertar = "insert into inmueble values('$this->id_inm',
																			'$this->id_usuario',
																			'$this->estado_inm',
																			'$this->direccion_inm',
                                                                            '$this->tipo_inm',
                                                                            '$this->opcion_inm',
                                                                            '$this->localidad_inm',
                                                                            '$this->barrio_inm',
																			'$this->inf_inm',
																			'$this->desc_inm',
																			'$this->precio_inm',
																			'$this->fechaC_inm',
																			'$this->fechaA_inm'
                    )";    
					mysqli_query($cone,$insertar);	
					echo "<script> alert('El Usuario a registrado un Inmueble')</script>";
								
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