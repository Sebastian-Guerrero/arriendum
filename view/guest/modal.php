<?php

$query6 = "SELECT * FROM user WHERE id_user = $id";
$result6 = mysqli_query($c, $query6);
$fila6 = mysqli_fetch_array($result6); 

?>
<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $fila['id_property']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">
            Propiedad: <?php echo $fila['id_property']; ?> - Dueño: <?php echo $fila6['name_user']; ?> <?php echo $fila6['lastname_user']; ?> 
        </h6>
      </div>

            <div class="modal-body" id="cont_modal">

<?php

$query7 = "SELECT All name_galery_property FROM galery_property WHERE id_property  =  $img";
$result7 = mysqli_query($c, $query7);

?>


<div class="carousel__container">
<?php  
while ($fila7 = mysqli_fetch_array($result7)) {
?>
  <div class="carousel__item">
    <img src="<?php echo $fila7['name_galery_property']; ?>">
  </div>
  <?php
};
?>
</div>
      
<div class="form-group">
<h3>Datos del Dueño:</h3>

<p><b>Celular:</b> <?php echo $fila6['phone_user']; ?></p>

<p><b>Email:</b> <?php echo $fila6['email_user']; ?></p>
</div>

<div class="form-group">
<h3>Datos de la Propiedad:</h3>

<p class="pi"><b>Localidad:</b> <?php echo $fila4['name_location_property']; ?></p>

<p><b>Barrio:</b> <?php echo $fila['neighborhood_property']; ?></p>

<p><b>Dirreccion:</b> <?php echo $fila['direction_property']; ?></p>

<p><b>Informacion:</b> <?php echo $fila['information_property']; ?></p>

<p><b>Descripcion:</b> <?php echo $fila['description_property']; ?></p>

<p class="pf"><b>Precio:</b> <?php echo $fila['cost_property']; ?></p>
</div>    
</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>

    </div>
  </div>
</div>
<!---fin ventana Update --->
