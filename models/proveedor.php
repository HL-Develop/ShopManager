<?php
if(!isset($db)){
  require($_SERVER['DOCUMENT_ROOT'].'/ShopManager/models/conexion.php');
}

class ProveedorModel{
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

    function listarProveedoresActivos(){
      if($this->conectar()){
        $query = "SELECT * FROM proveedores WHERE status=1 ORDER BY nombre";
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
  }
?>
