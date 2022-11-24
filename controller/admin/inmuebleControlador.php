<?php
include ("../../modelo/admin/inmuebleModelo.php");

$obj = new Inmueble();
if($_POST)
{

	$obj->id_inm = $_POST['id_inm'];
    $obj->id_usuario = $_POST['id_usuario'];
    $obj->estado_inm = $_POST['estado_inm'];
    $obj->direccion_inm = $_POST['direccion_inm'];
    $obj->tipo_inm = $_POST['tipo_inm'];
    $obj->opcion_inm = $_POST['opcion_inm'];
    $obj->localidad_inm = $_POST['localidad_inm'];
    $obj->barrio_inm = $_POST['barrio_inm'];
    $obj->inf_inm = $_POST['inf_inm'];
    $obj->desc_inm = $_POST['desc_inm'];
    $obj->precio_inm = $_POST['precio_inm'];
    $obj->fechaC_inm = $_POST['fechaC_inm'];
    $obj->fechaA_inm = $_POST['fechaA_inm'];

}

if(isset($_POST['guarda']))
{
    $obj->agregar();
}

if(isset($_POST['modifica']))
{
$obj->modificar();
}

if(isset($_POST['elimina']))
{
$obj->eliminar();
}

?>