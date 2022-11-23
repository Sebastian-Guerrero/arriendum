function validarCategorias(form){

      
    if(form.nombreCategorias.value.length==0){
        alert("Digite el Nombre de la Categoria");
        form.nombreCategorias.focus();
        return(false);
    }
      
      var letra="abcdefghijklmnñopqrstuv + ABCEDEFGHIJKLMNÑOPQRS";
      var cadena=form.nombreCategorias.value;
      var valida=true;

      for(i=0;i<cadena.length; i++)
        {
         
          	ch=cadena.charAt(i);
     	      for(j=0; j<letra.length; j++)
     	      if(ch==letra.charAt(j))
     	      break;
     	      if(j==letra.length)
       		  {
       		    valida = false;
        	    break;
        	    break;
          	}
   	    }
       if(!valida)
                {
	              alert("Digite Solo Letras en el Campo Nombre");
	              form.nombreCategorias.focus();
	              return(false);
	              }
	  
    var confirmar=confirm("Desea Realizar Los Cambios [Aceptar] o [Cancelar]");
   if(confirmar==false)
                       {
                        return(false);
                       }
                       return(true);

    }
    function validarProductos(form){
            
      
        if(form.nombreProducto.value.length==0){
            alert("Digite el Nombre del Producto");
            form.nombreProducto.focus();
            return(false);
        }
          
          var letra="abcdefghijklmnñopqrstuv + ABCEDEFGHIJKLMNÑOPQRS";
          var cadena=form.nombreProducto.value;
          var valida=true;
    
          for(i=0;i<cadena.length; i++)
            {
             
                  ch=cadena.charAt(i);
                   for(j=0; j<letra.length; j++)
                   if(ch==letra.charAt(j))
                   break;
                   if(j==letra.length)
                     {
                       valida = false;
                    break;
                    break;
                  }
               }
           if(!valida)
                    {
                      alert("Digite Solo Letras en el Campo Nombre");
                      form.nombreProducto.focus();
                      return(false);
                      }

        
        
        if(form.entradaProducto.value.length==0){
            alert("Digite el Numero del Producto");
            form.entradaProducto.focus();
            return(false);
        }
          
          var letra="1234567890";
          var cadena=form.entradaProducto.value;
          var valida=true;
    
          for(i=0;i<cadena.length; i++)
            {
             
                  ch=cadena.charAt(i);
                   for(j=0; j<letra.length; j++)
                   if(ch==letra.charAt(j))
                   break;
                   if(j==letra.length)
                     {
                       valida = false;
                    break;
                    break;
                  }
               }
           if(!valida)
                    {
                      alert("Digite Solo Numeros en el Campo Entradas");
                      form.entradaProducto.focus();
                      return(false);
                      }
          
        
        if(form.salidaProducto.value.length==0){
                        alert("Digite la Salida del Producto");
                        form.salidaProducto.focus();
                        return(false);
                    }
                      
                      var letra="1234567890";
                      var cadena=form.salidaProducto.value;
                      var valida=true;
                
                      for(i=0;i<cadena.length; i++)
                        {
                         
                              ch=cadena.charAt(i);
                               for(j=0; j<letra.length; j++)
                               if(ch==letra.charAt(j))
                               break;
                               if(j==letra.length)
                                 {
                                   valida = false;
                                break;
                                break;
                              }
                           }
                       if(!valida)
                                {
                                  alert("Digite Solo Numeros en el Campo Salidas");
                                  form.salidaProducto.focus();
                                  return(false);
                                  }
                    
           if(form.totalProducto.value.length==0){
                                    alert("Digite el Total del Producto");
                                    form.totalProducto.focus();
                                    return(false);
                                }
                                  
                                  var letra="1234567890";
                                  var cadena=form.totalProducto.value;
                                  var valida=true;
                            
                                  for(i=0;i<cadena.length; i++)
                                    {
                                     
                                          ch=cadena.charAt(i);
                                           for(j=0; j<letra.length; j++)
                                           if(ch==letra.charAt(j))
                                           break;
                                           if(j==letra.length)
                                             {
                                               valida = false;
                                            break;
                                            break;
                                          }
                                       }
                                   if(!valida)
                                            {
                                              alert("Digite Solo Numeros en el Campo Total");
                                              form.totalProducto.focus();
                                              return(false);
                                              }
                    
               if(form.valorProducto.value.length==0){
                                                alert("Digite el Valor del Producto");
                                                form.valorProducto.focus();
                                                return(false);
                                            }
                                              
                                              var letra="1234567890";
                                              var cadena=form.valorProducto.value;
                                              var valida=true;
                                        
                                              for(i=0;i<cadena.length; i++)
                                                {
                                                 
                                                      ch=cadena.charAt(i);
                                                       for(j=0; j<letra.length; j++)
                                                       if(ch==letra.charAt(j))
                                                       break;
                                                       if(j==letra.length)
                                                         {
                                                           valida = false;
                                                        break;
                                                        break;
                                                      }
                                                   }
                                               if(!valida)
                                                        {
                                                          alert("Digite Solo Numeros en el Campo Valor");
                                                          form.valorProducto.focus();
                                                          return(false);
                                                          }


                         if(form.imagenProducto.value.length==0){
                                             alert("Debe seleccionar una Imagen");
                                             form.imagenProducto.focus();
                                             return(false);
                                           }
                        
                         if(form.idCategorias.value.selectedIndex==0){
                                            alert("Debe seleccionar la Categoria");
                                            form.idCategorias.focus();
                                            return(false);
                         }
                         if(form.idProveedor.value.selectedIndex==0){
                            alert("Debe seleccionar El proveedor");
                            form.idProveedor.focus();
                            return(false);
         }


                       
                                                    
        
        
        
        
        var confirmar=confirm("Desea Realizar Los Cambios [Aceptar] o [Cancelar]");
       if(confirmar==false)
                           {
                            return(false);
                           }
                           return(true);
    
        }
