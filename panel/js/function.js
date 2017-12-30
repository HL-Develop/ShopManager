$( document ).ready(function() {
    //========================================================================//
    $('#sendLogin').on('click',function(event){
      event.preventDefault();

      var user = $('input#usuario').val();
      var password = $('input#password').val();

      if(user!='' && password!=''){
        $.ajax({
          url:'controllers/login.php',
          type:'POST',
          data:{usuario:user, contraseña:password},
          success:function(response){
            if(response=='Exito'){
              alertify.alert('Exito!', 'Bienvenido al sistema',function(){ window.location='/ShopManager/panel/'; }).set('closable', false);
            }else{
              alertify.alert('Acceso denegado!', 'Datos incorrectos').set('closable', false);
            }
          },
          error:function(error){
            alertify.alert('Upps!', 'Ocurrio un error, intente nuevamente').set('closable', false);
          }
        });
      }else{
        alertify.alert('Acceso denegado!', 'Llene todos los campos').set('closable', false);
      }
    })
});
