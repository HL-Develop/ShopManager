<?php
  if(!isset($db)){
    require($_SERVER['DOCUMENT_ROOT'].'/ShopManager/models/conexion.php');
  }
class usuarioModel{
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

  function login($user,$password){
    if($this->conectar()){
      $query = "SELECT * FROM usuarios where usuario='".$user."' AND contrasena='".$password."'";
      $resultado = $this->con->query($query);
      if($resultado->num_rows==1){
        $row=$resultado->fetch_assoc();
        return $row;
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
