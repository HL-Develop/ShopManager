<?php
class usuarioModel{
  private $con;

  function conectar(){
    $this->con = new mysqli("localhost", "root", "", "shopmanager");
    if ($this->con->connect_errno) {
        return false;
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
