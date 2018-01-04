$( document ).ready(function() {
    console.log('ready');
    /** ************************************************************************
    *****************************FUNCIONES DE LOGIN*****************************
    ************************************************************************* */
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
              alertify.alert('Exito!', 'Bienvenido al sistema',
                function(){
                  window.location='/ShopManager/panel/';
              }).set('closable', false);
            }else{
              alertify.alert('Acceso denegado!', 'Datos incorrectos')
              .set('closable', false);
            }
          },
          error:function(error){
            alertify.alert('Upps!', 'Ocurrio un error, intente nuevamente')
            .set('closable', false);
          }
        });
      }else{
        alertify.alert('Acceso denegado!', 'Llene todos los campos')
        .set('closable', false);
      }
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



    /* ************************************************************************
    ***********************FUNCIONES DE MODULO PRODUCTOS***********************
    ************************************************************************* */
    $('#ir-nuevo-producto').on('click',function(event){
      event.preventDefault();
      window.location='/ShopManager/panel/productos/agregar.php'
    });
    //========================================================================//
    $('.ir-producto-editar').on('click',function(event){
      event.preventDefault();
      var id = $(this).attr('id');
      var descripcion = $('td#descripcion-'+id).html();
      alertify.confirm('Modificar producto', '¿Desesas modificar '+descripcion+'?',
        function(){
          window.location='/ShopManager/panel/productos/modificar.php?pro='+id;
        }, function(){
          alertify.error('No se modificó el producto');
      }).set('closable', false);

    });
    //========================================================================//
    $('.producto-eliminar').on('click',function(event){
      event.preventDefault();
      var id = $(this).attr('id');
      var descripcion = $('td#descripcion-'+id).html();
      alertify.confirm('Eliminar producto', '¿Desesas eliminar '+descripcion+'?',
        function(){
          $.ajax({
            url:'../../controllers/producto.php',
            type:'POST',
            data:{type:'eliminar',producto:id},
            success:function(response){
              if(response=='Exito'){
                alertify.success('Producto eliminado');
                $('td#descripcion-'+id).closest('tr').remove();
              }else{
                alertify.error('No se eliminó el producto');
              }
            },
            error:function(error){
              alertify.error('No se eliminó el producto');
            }
          });
        }, function(){
          alertify.error('No se eliminó el producto');
      }).set('closable', false);
    });
    //========================================================================//
    $('#producto-agregar').on('click',function(event){
      event.preventDefault();
      var datos = JSON.stringify($('#producto-agregar-form').serializeArray());
      $.ajax({
        url:'../../controllers/producto.php',
        type:'POST',
        data:{type:'agregar',producto:datos},
        success:function(response){
          if(response=='Exito'){
            alertify.alert('Exito!', 'Producto agregado',
              function(){
                window.location='/ShopManager/panel/productos';
              }).set('closable', false);
          }else{
            alertify.error('No se agregó el producto');
          }
        },
        error:function(error){
          console.log(error);
          alertify.error('No se agregó el producto');
        }
      });
    });
    //========================================================================//
    $('#producto-modificar').on('click',function(event){
      event.preventDefault();
      var datos = JSON.stringify($('#producto-modificar-form').serializeArray());
      var pid=$('input#id').attr('value');
      console.log('id='+pid);
      $.ajax({
        url:'../../controllers/producto.php',
        type:'POST',
        data:{type:'modificar',producto:datos,id:pid},
        success:function(response){
          if(response=='Exito'){
            alertify.alert('Exito!', 'Producto modificado',
              function(){
                window.location='/ShopManager/panel/productos';
              }).set('closable', false);
          }else{
            alertify.error('No se modificó el producto');
          }
        },
        error:function(error){
          console.log(error);
          alertify.error('No se modificó el producto');
        }
      });
    });
    //========================================================================//
    $('input#buscar-producto').on('click',function(event){
      var palabra = $(this).attr('value');
      buscarProducto(palabra);
    });
    $('.buscar-producto').on('click',function(event){
      var palabra = $('input#buscar-producto').attr('value');
      buscarProducto(palabra);
    });
    /* ************************************************************************
    **************************FUNCIONES DE FORMULARIOS**************************
    ************************************************************************* */
    $('input').on('focusout',function(event){
      event.preventDefault();
      errorInput('input#'+$(this).attr('id'));
    });
});
//============================================================================//
function buscarProducto(palabra){
  alert(palabra);
}
//============================================================================//
function errorInput(inputId){
  /*if($(inputId).val()=='' || $(inputId).val()==undefined){
    $(inputId).attr('data-toggle','popover');
    $(inputId).attr('data-placement','top');
    $(inputId).attr('data-content','Completa este campo');
    $(inputId).addClass('error-input');
    $(inputId).popover('show');
  }else{
    $(inputId).removeClass('error-input');
    $(inputId).popover('hide');
  }*/
}
