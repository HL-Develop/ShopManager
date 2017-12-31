$( document ).ready(function() {
  console.log('ready');
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
    });
    //========================================================================//
    $('input').on('focusout',function(event){
      event.preventDefault();
      errorInput('input#'+$(this).attr('id'));
    });
    //========================================================================//
    $('a#sendLogout').on('click',function(event){
      event.preventDefault();
      alertify.alert('Adios!', 'Estas saliendo del sistema',
        function(){
          window.location='/ShopManager/controllers/logout.php';
        }
      ).set('closable', false);
    });
});
//============================================================================//
function errorInput(inputId){
  if($(inputId).val()=='' || $(inputId).val()==undefined){
    $(inputId).attr('data-toggle','popover');
    $(inputId).attr('data-placement','top');
    $(inputId).attr('data-content','Completa este campo');
    $(inputId).addClass('error-input');
    $(inputId).popover('show');
  }else{
    $(inputId).removeClass('error-input');
    $(inputId).popover('hide');
  }
}
