<?php
require($_SERVER['DOCUMENT_ROOT'].'/ShopManager/models/producto.php');
require($_SERVER['DOCUMENT_ROOT'].'/ShopManager/models/categoria.php');
require($_SERVER['DOCUMENT_ROOT'].'/ShopManager/models/proveedor.php');

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

  function listarProveedoresActivos(){
    $pm = new ProveedorModel();
    $lista = $pm->listarProveedoresActivos();
    return $lista;
  }

  function agregarProducto($producto){
    $decoded = json_decode($producto,true);
    $query = "INSERT INTO producto (";
    $query2 = ") VALUES (";
    foreach ($decoded as $value) {
      $query.= $value["name"].',';
      $query2.= '"'.$value["value"].'",';
    }

    return substr($query,0,-1).substr($query2,0,-1).');';
  }
  function eliminarProducto($producto){
    $pm = new ProductoModel();
    $eliminar = $pm->eliminar($producto);
    return $eliminar;
  }
}
 ?>
