/* usuario actualizado y no se pudo acrualizar*/
if (typeof update_ok !== "undefined") {
  if (update_ok == 1) {
      Swal.fire({
          icon: 'success',
          title: 'Usario actualizado',
          text: 'presione aceptar para continuar'
         
        })
  }
  else(
      Swal.fire({
          icon: 'warning',
          title: 'No se pudo actualizar, revise los campos',
          text: 'presione aceptar para continuar'
         
        })
  )

}

/* exit of sign in */
  
      function cerrar_sesion() {
          Swal.fire({
              title: 'Estas seguro de cerrar sesion?',
              icon: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'aceptar'
            }).then((result) => {
              if (result.isConfirmed) {
                  location.href="../../connect/logout.php"
                
              }
            })
      }



      function error_filtro(){
          Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Por favor selecciona una localidad!',  
            }).then((result) => {
            var filtro=document.getElementById('location_property');
            if (filtro.value==0 ||
                filtro.value==""){
              }
            })
      }


  if (typeof alerta_vacio !== "undefined") {
    if (alerta_vacio == "1") {
        Swal.fire({
            icon: 'warning',
            title: 'Por Favor Seleccione Una Localidad',
            text: 'presione aceptar si entendio'
            
          })
    }
    else(
        Swal.fire({
            icon: 'warning',
            title: 'No se pudo actualizar, revise los campos',
            text: 'presione aceptar para continuar'
            
          })
    )

}