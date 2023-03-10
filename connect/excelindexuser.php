<?php
require_once("conectar.php");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=ReportesDeMisInmuebles.xls");

session_start();
$id_user = $_SESSION ['id_user'];

$conet = new Conexion();
$c = $conet->conectando();
$query="select count(*) as totalRegistros from property where id_user='$id_user'";
$resultado = mysqli_query($c, $query);
$arreglo = mysqli_fetch_array($resultado); 
$totalRegistros = $arreglo['totalRegistros'];

$query2="select * from property where id_user='$id_user'";
$resultado2=mysqli_query($c,$query2);
$arreglo2 = mysqli_fetch_array($resultado2);

$id_state_property = $arreglo2[2];
$query3= "SELECT * FROM state_property WHERE id_state_property = '$id_state_property'";
$resultado3 = mysqli_query($c,$query3);
$arreglo3=mysqli_fetch_array($resultado3);

$id_type_property = $arreglo2[4];
$query4= "SELECT * FROM type_property WHERE id_type_property = '$id_type_property'";
$resultado4 = mysqli_query($c,$query4);
$arreglo4=mysqli_fetch_array($resultado4);

$id_option_property = $arreglo2[5];
$query5= "SELECT * FROM option_property WHERE id_option_property = '$id_option_property'";
$resultado5 = mysqli_query($c,$query5);
$arreglo5=mysqli_fetch_array($resultado5);

$id_location_property = $arreglo2[6];
$query6= "SELECT * FROM location_property WHERE id_location_property = '$id_location_property'";
$resultado6 = mysqli_query($c,$query6);
$arreglo6=mysqli_fetch_array($resultado6);

?>
<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>ID INMUEBLE</th>
								<th>USUARIO</th>
								<th>ESTADO</th>
								<th>DIRECCION</th>
								<th>TIPO</th>
								<th>OPCION</th>
								<th>LOCALIDAD</th>
                                <th>BARRIO</th>
								<th>INFORMACION</th>
								<th>DESCRIPCION</th>
								<th>PRECIO</th>
								<th>CREACION INMUEBLE</th>
								<th>ULTIMA ACTUALIZACION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
                                	if($arreglo2==0){
                                    //echo "No existen Registros";
                                ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo "No hay registros" ?>
                                </div>
                                <?php 
                                }   
                                 else{
                                    do{   
                               ?>
							</tr>

							<tr class="text-center">
								<td><?php echo $arreglo2[0] ?></td>
								<td><?php echo $arreglo2[1] ?></td>
								<td><?php echo $arreglo3[1] ?></td>
								<td><?php echo $arreglo2[3] ?></td>
								<td><?php echo $arreglo4[1] ?></td>
								<td><?php echo $arreglo5[1] ?></td>
								<td><?php echo $arreglo6[1] ?></td>
								<td><?php echo $arreglo2[7] ?></td>
								<td><?php echo $arreglo2[8] ?></td>
								<td><?php echo $arreglo2[9] ?></td>
								<td><?php echo $arreglo2[10] ?></td>
								<td><?php echo $arreglo2[11] ?></td>
								<td><?php echo $arreglo2[12] ?></td>
								<td>
									<a  class="btn btn-success" href="<?php 
										if($arreglo2[0]<>''){
											echo "user-update.php?key=".urlencode($arreglo2[0]) ;
									}
									?>" >
	  									<i class="fas fa-sync-alt"></i>	
									</a>
								</td>	
                        	</tr>
                        	<?php
                            	}while($arreglo2 = mysqli_fetch_array($resultado2));
                       		}
                        	?>
						</tbody>
					</table>
				</div>