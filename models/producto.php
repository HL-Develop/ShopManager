<?php
if(!isset($db)){
  require($_SERVER['DOCUMENT_ROOT'].'/ShopManager/models/conexion.php');
}
  class ProductoModel{
    private $con;

    function conectar(){
      $db = new database();
      $this->con = new mysqli($db->server, $db->user, $db->password, $db->database);
      if ($this->con->connect_errno) {
      return "error conexion";
        //  return false;
      }else{
        return true;
      }
    }

    function listarProductosActivos(){
      if($this->conectar()){
        $query = "SELECT categorias.nombre as categoria,codigo,descripcion,stock, precio, productos.id
        FROM productos INNER JOIN categorias ON productos.categoria=categorias.id
        WHERE productos.status=1 ORDER BY categoria";
        $resultado = $this->con->query($query);
        $this->con->close();
        if($resultado->num_rows==0){
          return false;
        }else{
          return $resultado;
        }
      }else{
        return false;
      }
    }

    function consultarProductos($categoria,$buscar){
      if($categoria==0){
        $where ="(productos.codigo='".$buscar."' OR productos.descripcion like '%".$buscar."%')";
      }else if ($buscar=='') {
        $where ="categorias.id=".$categoria;
      }else{
        $where ="categorias.id=".$categoria." AND (productos.codigo='".$buscar."' OR productos.descripcion like '%".$buscar."%')";
      }
      if($this->conectar()){
        $query = "SELECT categorias.nombre as categoria,codigo,descripcion,stock, precio, productos.id
            FROM productos INNER JOIN categorias ON productos.categoria=categorias.id
            WHERE productos.status=1 AND ".$where." ORDER BY categoria;";
        $resultado = $this->con->query($query);
        $this->con->close();
        
        if($resultado->num_rows==0){
          return false;
        }else{
          return $resultado;
        }
      }else{
        return false;
      }
    }

    function agregarProducto($producto){
      $firts = "INSERT INTO productos (";
      $last = ") VALUES (";
      foreach ($producto as $value) {
        $firts.= $value["name"].',';
        $last.= '"'.$value["value"].'",';
      }
      $query = substr($firts,0,-1).substr($last,0,-1).');';
      if($this->conectar()){
        $resultado = $this->con->query($query);
        if($this->con->affected_rows==1){
          return 'Exito';
        }else{
          return false;
        }
        $this->con->close();
      }else{
        return false;
      }
    }

    function datosProducto($id){
      if($this->conectar()){
        $query = "SELECT categorias.nombre as categoria,codigo,descripcion,precio, productos.id as pid, categorias.id as cid
        FROM productos INNER JOIN categorias ON productos.categoria=categorias.id
        WHERE productos.id=".$id;
        $resultado = $this->con->query($query);
        if($resultado->num_rows==1){
          return $resultado->fetch_assoc();
        }else{
          return false;
        }
        $this->con->close();
      }else{
        return false;
      }
    }

    function modificarProducto($producto,$id){
      $query = "UPDATE productos SET ";
      foreach ($producto as $value) {
        $query.= $value["name"].'="'.$value["value"].'",';

      }
      $query = substr($query,0,-1).' WHERE id = '.$id.';';
      if($this->conectar()){
        $resultado = $this->con->query($query);
        if($this->con->affected_rows==1){
          return 'Exito';
        }else{
          return false;
        }
        $this->con->close();
      }else{
        return false;
      }
    }

    function eliminar($id){
      if($this->conectar()){
        $query = "UPDATE productos SET status=0 WHERE id=".$id;
        $resultado = $this->con->query($query);
        if($this->con->affected_rows==1){
          return 'Exito';
        }else{
          return false;
        }
        $this->con->close();
      }else{
        return false;
      }
    }
  }
?>
