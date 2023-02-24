$('.message a').click(function(){
  $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

/*function subir_imagenes(params) {
  var len = document.getElementById("lista").isDefaultNamespace.length;
  lista_img = new FormData();

  for (i=0; i < lent ; i++){
    img = document.getElementById("lista").files[i];
    if(!!img.type.match(/image.*//*)){
      if(window.FileReader){
        img_leida = new FileReader();
        img_leida = readAsDataURL(IMG);
      }
      lista_img.append("img_extra[]", img)
    }
  }

 $.ajax({
  url: "recibirimg.php",
  type: "POST",
  data: lista_img,
  cache: false,
  contentType: false,
  processData: false,
  success: function(resp) {
    
  }
 });

}*/

