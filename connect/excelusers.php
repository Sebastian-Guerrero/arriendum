<?php
require_once("conectar.php");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=ReportesDeUsuarios.xls");


$conet = new Conexion();
$c = $conet->conectando();
$query="select count(*) as totalRegistros from user";
$resultado = mysqli_query($c, $query);
$arreglo = mysqli_fetch_array($resultado); 
$totalRegistros = $arreglo['totalRegistros'];

$query2="select * from user";
$resultado2=mysqli_query($c,$query2);
$arreglo2 = mysqli_fetch_array($resultado2);

?>
<div>
				<div >
					<table border="1" >
						<thead >
							<tr >
							<p  style="text-align:center;">DATOS DE USUARIOS</p>
								<th>ID</th>
								<th>ESTADO</th>
								<th>ROL</th>
								<th>DOCUMENTO</th>
								<th>NOMBRE</th>
								<th>APELLIDO</th>
								<th>CELULAR</th>
                                <th>CORREO</th>
								<th>USUARIO CREADO</th>
								<th>ULTIMA ACTUALIZACION </th>
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
								<td><?php echo $arreglo2[2] ?></td>
								<td><?php echo $arreglo2[3] ?></td>
								<td><?php echo $arreglo2[4] ?></td>
								<td><?php echo $arreglo2[5] ?></td>
								<td><?php echo $arreglo2[6] ?></td>
								<td><?php echo $arreglo2[7] ?></td>
								<td><?php echo $arreglo2[9] ?></td>
								<td><?php echo $arreglo2[10] ?></td>
                        	</tr>
                        	<?php
                            	}while($arreglo2 = mysqli_fetch_array($resultado2));
                       		}
                        	?>
						</tbody>
					</table>
				</div>
</div>