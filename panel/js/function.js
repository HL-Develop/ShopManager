$( document ).ready(function() {
    //========================================================================//
    $('#sendLogin').on('click',function(event){
      event.preventDefault();

      var user = $('input#usuario').val();
      var password = $('input#password').val();

      $.ajax({
        url:'controllers/login.php',
        type:'POST',
        data:{type:'login',usuario:user, contraseña:password},
        success:function(response){
          console.log(response);
          if(response=='Exito'){
            window.location='/ShopManager/panel/';
          }else{
            alert('Datos incorrectos');
          }
        },
        error:function(error){
          alert('Ocurrio un error, intente nuevamente');
        }
      });

    })
});
