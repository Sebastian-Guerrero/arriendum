<?php
include ("../../model/admin/propertyModel.php");

$obj = new Property();
if($_POST)
{

    $obj->id_property = $_POST['id_property'];
    $obj->id_user = $_POST['id_user'];
    $obj->state_property = $_POST['state_property'];
    $obj->direction_property = $_POST['direction_property'];
    $obj->type_property = $_POST['type_property'];
    $obj->option_property = $_POST['option_property'];
    $obj->location_property = $_POST['location_property'];
    $obj->neighborhood_property = $_POST['neighborhood_property'];
    $obj->information_property = $_POST['information_property'];
    $obj->description_property = $_POST['description_property'];
    $obj->cost_property = $_POST['cost_property'];
    $obj->create_property = $_POST['create_property'];
    $obj->update_property = $_POST['update_property'];

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