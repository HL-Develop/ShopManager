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
        case 'consultar':
            $respuesta = $this->consultarProductos($_POST['en'],$_POST['buscar']);
            return $respuesta;
            break;
        case 'getProducto':
            $respuesta = $this->getProducto($_POST['producto']);
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

  function consultarProductos($categoria,$buscar){
    $pm = new productoModel();
    if($buscar=='' && $categoria==0){ //todos los productos de todas las categorias
      $consulta = $pm->listarProductosActivos();
    }else{
      $consulta = $pm->consultarProductos($categoria,$buscar);
    }
    $objArray = array();
    while($fila=$consulta->fetch_assoc()){
      array_push($objArray, $fila);
    }
    $objJSON = json_encode($objArray,JSON_FORCE_OBJECT);
    return   $objJSON;
  }

  function getProducto($codigo){
    $pm = new productoModel();
    $producto = $pm->getProducto($codigo);
    return   json_encode($producto,JSON_FORCE_OBJECT);
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
