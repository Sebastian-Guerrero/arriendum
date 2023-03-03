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

        //Alert the filtro
        if (typeof alerta_vacio !== "undefined") {
          if (alerta_vacio == "1") {
              Swal.fire({
                  icon: 'warning',
                  title: 'Por Favor Seleccione una Localidad',
                  text: 'presione aceptar'
                    	
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
