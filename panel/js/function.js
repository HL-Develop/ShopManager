var errorLabel = '<i class="fa fa-times" aria-hidden="true"></i> ';
var successLabel = '<i class="fa fa-check" aria-hidden="true"></i> ';
$( document ).ready(function() {
    /** *****************************FUNCIONES DE LOGIN********************** */
      $('#sendLogin').on('click',function(event){
        event.preventDefault();
        var user = $('input#usuario').val();
        var password = $('input#password').val();
        if(validaForm()){
          sendLogin(user,password);
        }
      });
      //======================================================================//
      $('a#sendLogout').on('click',function(event){
        event.preventDefault();
        alertify.alert('Adios!', 'Estas saliendo del sistema',
          function(){
            window.location='/ShopManager/controllers/logout.php';
          }
      ).set('closable', false);
    });
    /* ***********************FUNCIONES DE MODULO PRODUCTOS****************** */
      $('#ir-nuevo-producto').on('click',function(event){
        event.preventDefault();
        window.location='/ShopManager/panel/productos/agregar.php'
      });
      //======================================================================//
      $('.ir-producto-editar').on('click',function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var descripcion = $('td#descripcion-'+id).html();
        alertify.confirm('Modificar producto', '¿Desesas modificar '+descripcion+'?',
          function(){
            window.location='/ShopManager/panel/productos/modificar.php?pro='+id;
          }, function(){
            alertify.error('<h4>'+errorLabel+'No se modificó el producto');
        }).set('closable', false);

      });
      //======================================================================//
      $('.producto-eliminar').on('click',function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        var descripcion = $('td#descripcion-'+id).html();
        alertify.confirm('Eliminar producto', '¿Desesas eliminar '+descripcion+'?',
          function(){
            eliminarProducto(id);
          }, function(){
            alertify.error('<h4>'+errorLabel+'No se eliminó el producto</h4>');
        }).set('closable', false);
      });
      //======================================================================//
      $('#producto-agregar').on('click',function(event){
        event.preventDefault();
        var datos = JSON.stringify($('#producto-agregar-form').serializeArray());
        if(validaForm()){
          agregarProducto(datos);
        }
      });
      //======================================================================//
      $('#producto-modificar').on('click',function(event){
        event.preventDefault();
        var datos = JSON.stringify($('#producto-modificar-form').serializeArray());
        var pid=$('input#id').attr('value');
        if(validaForm()){
          modificarProducto(datos, pid);
        }
      });
      //======================================================================//
      $('.buscar-producto').on('click',function(event){
        var palabra = $('#buscar-producto').val();
        var categoria = $('#buscar-categoria').val();
        buscarProducto(categoria,palabra);
      });
    /* ************************FUNCIONES DE MODULO VENTAS******************** */
      $('input#producto').on('keypress',function(event){
        if(event.charCode==13){
          getProducto();
        }
      });
      $('.agregar-venta').on('click',function(event){
          getProducto();
      });
      //======================================================================//
      $('.btn-vender').on('click',function(event){
        if($('#table-venta tr').length==1){
          alertify.error('<h4>'+errorLabel+'No hay productos por cobrar.</h4>');
        }else{

        }
        $('#table-venta tr').each(function(){
          console.log('tupla');
        });
      });
      //======================================================================//
      $('#table-venta tr').on('click',function() {
        console.log('click on table tr');
          $(this).children("td").on('click',function(){
            console.log("click on td");
          })

      })

});

//============================================================================//
function buscarProducto(categoria,palabra){
  $.ajax({
    url:'../../controllers/producto.php',
    type:'POST',
    data:{type:'consultar',en:categoria,buscar:palabra},
    success:function(response){
      response = JSON.parse(response);
      $('tbody').empty();
      $.each(response, function(i, item) {
          var tupla ='<tr><td>'+item.categoria+'</td>';
          tupla+='<td class="td-center">'+item.codigo+'</td>';
          tupla+='<td id="descripcion-'+item.id+'">'+item.descripcion+'</td>';
          tupla+='<td>$ '+item.precio+'</td>';
          tupla+='<td class="td-center">'+item.stock+'</td>';
          tupla+='<td class="td-center">';
          tupla+='<i id="'+item.id+'" class="fa fa-pencil text-warning ir-producto-editar" aria-hidden="true"></i>';
          tupla+='</td>';
          tupla+='<td class="td-center">';
          tupla+='<i id="'+item.id+'" class="fa fa-times text-danger producto-eliminar" aria-hidden="true"></i>';
          tupla+='</td>';
          tupla+='</tr>';
          $('tbody').append(tupla);
      });
    },
    error:function(error){
      alertify.error('<h4>'+errorLabel+'No se encontrrón coincidencias.</h4>');
    }
  });
}
//============================================================================//
function validaForm(){
  var valid = true;
  $('input').removeClass('error-input');
  $('input').popover('hide');
  $('select').removeClass('error-select');
  $('select').popover('hide');

  $('input').each(function(){
    if(isRequire($(this)) && isEmpty($(this)) ){
      $(this).attr('data-toggle','popover');
      $(this).attr('data-placement','top');
      $(this).attr('data-content','Completa este campo');
      $(this).addClass('error-input');
      $(this).popover('show');
      valid = false;
    }
  });
  $('select').each(function(){
    if(isRequire($(this)) && isEmpty($(this)) ){
      $(this).attr('data-toggle','popover');
      $(this).attr('data-placement','top');
      $(this).attr('data-content','Completa este campo');
      $(this).addClass('error-select');
      $(this).popover('show');
      valid = false;
    }
  });
  return valid;
}
//============================================================================//
function isRequire(object){
  if(object.prop('required') == 'undefined'){
    return false;
  }else{
    return true;
  }
}
//============================================================================//
function isEmpty(object){
  if(object.val() == 'undefined' || object.val() ==''){
    return true;
  }else{
    return false;
  }
}
//============================================================================//
function sendLogin(user,password){
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
}
//============================================================================//
function eliminarProducto(id){
  $.ajax({
    url:'../../controllers/producto.php',
    type:'POST',
    data:{type:'eliminar',producto:id},
    success:function(response){
      if(response=='Exito'){
        alertify.success('<h4>'+successLabel+'Producto eliminado</h4>');
        $('td#descripcion-'+id).closest('tr').remove();
      }else{
        alertify.error('<h4>'+errorLabel+'No se eliminó el producto</h4>');
      }
    },
    error:function(error){
      alertify.error('<h4>'+errorLabel+'No se eliminó el producto</h4>');
    }
  });
}
//============================================================================//
function agregarProducto(datos){
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
        alertify.error('<h4>'+errorLabel+'No se agregó el producto</h4>');
      }
    },
    error:function(error){
      alertify.error('<h4>'+errorLabel+'No se agregó el producto</h4>');
    }
  });
}
//============================================================================//
function modificarProducto(datos, pid){
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
        alertify.error('<h4>'+errorLabel+'No se modificó el producto</h4>');
      }
    },
    error:function(error){
      alertify.error('<h4>'+errorLabel+'No se modificó el producto</h4>');
    }
  });
}
//============================================================================//
function getProducto(){
  var codigo = $('input#producto').val();
  $.ajax({
    url:'../../controllers/producto.php',
    type:'POST',
    data:{type:'getProducto',producto:codigo},
    success:function(response){
      if(response=='0'){
        console.log('Buscar producto');
      }else{
        addItemVenta(JSON.parse(response));
        calculaTotalVenta(JSON.parse(response).precio);
      }
    },
    error:function(error){
      alertify.error('<h4>'+errorLabel+'No se modificó el producto</h4>');
    }
  });
//============================================================================//
function addItemVenta(producto){
  var tupla ='<tr>';
  tupla+= '<td class="td-center">'+producto.codigo+'</td>';
  tupla+= '<td>'+producto.descripcion+'</td>';
  tupla+='<td class="td-center" ><input id="'+producto.id+'" type="number" min="1" onchange="'+echoOnchangeVenta()+'" value="1"/></td>';
  tupla+= '<td id="precio'+producto.id+'" class="td-center">$ '+producto.precio+'</td>';
  tupla+= '<td id="total'+producto.id+'" class="td-center">$ '+producto.precio+'</td>';
  tupla+= '<td onclick="$(this).closest(\'tr\').remove();" class="td-center delete-item-venta"><i class="fa fa-times fa-2x text-danger" aria-hidden="true"></i></td>';
  tupla+= '</tr>';
  $('tbody').append(tupla);
}
//============================================================================//
function echoOnchangeVenta(){
  var cadena ="$('td#total'+$(this).attr('id')).html('$ '+parseFloat(parseFloat($('td#precio'+$(this).attr('id')).html().replace('$ ',''))*parseFloat($(this).val())).toFixed(2));";
  return cadena;
}
//============================================================================//
function calculaTotalVenta(precio){
  var total = parseFloat('0.00').toFixed(2);
  $('h1#total-venta').empty();
  $('h1#total-venta').append('$ '+total);
}

}
