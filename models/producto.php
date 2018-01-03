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
