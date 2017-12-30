<?php
session_start();

if(isset($_POST['usuario']) && isset($_POST['contraseña'])){
  $uc = new loginController();
  echo $uc->login($_POST['usuario'],$_POST['contraseña']);
}else{
  echo "Error";
}
//============================================================================//

class loginController{
  function login($user, $password){

    $_SESSION['usuario']=$user;

    return 'Exito';
  }
}
?>
