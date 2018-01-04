<?php
require($_SERVER['DOCUMENT_ROOT'].'/ShopManager/models/producto.php');
require($_SERVER['DOCUMENT_ROOT'].'/ShopManager/models/categoria.php');

//============================================================================//
if(isset($_POST['type'])){
  $uc = new ProductoController();
  echo $uc->switchType($_POST['type']);
}
//============================================================================//
class ProductoController{

  function switchType($type){
      switch ($_POST['type']) {
        case 'eliminar':
          $respuesta = $this->eliminarProducto($_POST['producto']);
          return $respuesta;
          break;
        case 'agregar':
            $respuesta = $this->agregarProducto($_POST['producto']);
            return $respuesta;
            break;
        case 'modificar':
            $respuesta = $this->modificarProducto($_POST['producto'],$_POST['id']);
            return $respuesta;
            break;
        default:
          return 'Error';
          break;
      }
  }

  function listarProductosActivos(){
    $pm = new productoModel();
    $lista = $pm->listarProductosActivos();
    return $lista;
  }

  function listarCategoriasActivas(){
    $cm = new CategoriaModel();
    $lista = $cm->listarCategoriasActivas();
    return $lista;
  }

  function agregarProducto($producto){
    $formData = json_decode($producto,true);
    $pm = new ProductoModel();
    $agregar = $pm->agregarProducto($formData);
    return $agregar;
  }

  function datosProducto($id){
    $pm = new ProductoModel();
    $datos = $pm->datosProducto($id);
    return $datos;
  }

  function modificarProducto($producto,$id){
    $formData = json_decode($producto,true);
    $pm = new ProductoModel();
    $modificar = $pm->modificarProducto($formData,$id);
    return $modificar;
  }

  function eliminarProducto($producto){
    $pm = new ProductoModel();
    $eliminar = $pm->eliminar($producto);
    return $eliminar;
  }
}
 ?>
