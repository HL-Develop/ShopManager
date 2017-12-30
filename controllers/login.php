<?php
session_start();

require($_SERVER['DOCUMENT_ROOT'].'/ShopManager/models/usuario.php');

if(!isset($_SESSION['usuario'])){
  if(isset($_POST['usuario']) && isset($_POST['contraseña'])){
    $uc = new loginController();
    echo $uc->login($_POST['usuario'],$_POST['contraseña']);
  }else{
    echo "Error";
  }
}else{
  echo "Error";
}
//============================================================================//

class loginController{
  function login($user, $password){
      $um = new usuarioModel();
      $usuario = $um->login($user, md5($password));
      if(!$usuario){
        return "Error";
      }else{
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['usuario'] = $usuario['usuario'];
        $_SESSION['roll'] = $usuario['roll'];
        return "Exito";
      }
  }
}
?>
