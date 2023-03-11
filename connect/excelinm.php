<?php
require_once("conectar.php");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=ReportesDeInmuebles.xls");


$conet = new Conexion();
$c = $conet->conectando();
$query="select count(*) as totalRegistros from property";
$resultado = mysqli_query($c, $query);
$arreglo = mysqli_fetch_array($resultado); 
$totalRegistros = $arreglo['totalRegistros'];

$query2="select * from property";
$resultado2=mysqli_query($c,$query2);
$arreglo2 = mysqli_fetch_array($resultado2);

?>
<div class="container-fluid">
				<div class="table-responsive">
					<table border="1" >
							<h1 style="text-align:center;">DATOS DE INMUEBLES</h1>
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
                                <th>INMUEBLE CREADO</th>
							</tr>
						<tbody>
							<?php
                            if($arreglo2==0){
                                //echo "No hay registro";
                            ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo "No hay registros" ?>
                            </div>
                            <?php
                            }
                             else{
                                do{
                            ?>
							<tr style="background: #00ADB5;" class="text-center" >
								<td><?php echo $arreglo2[0];?></td>
								<td><?php echo $arreglo2[1];?></td>
								<td><?php echo $arreglo2[2];?></td>
								<td><?php echo $arreglo2[3];?></td>
								<td><?php echo $arreglo2[4];?></td>
								<td><?php echo $arreglo2[5];?></td>
								<td><?php echo $arreglo2[6];?></td>
								<td><?php echo $arreglo2[7];?></td>
								<td><?php echo $arreglo2[8];?></td>
								<td><?php echo $arreglo2[9];?></td>
								<td><?php echo $arreglo2[10];?></td>
                                <td><?php echo $arreglo2[11];?></td>
							<?php
                            }while($arreglo2 = mysqli_fetch_array($resultado2));
                       		}
                        	?>
						</tbody>
					</table>
				</div>