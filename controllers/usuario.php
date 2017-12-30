<?php
session_start();

if(isset($_POST['type'])){
  $uc = new usuarioController();
  echo $uc->switchType($_POST['type']);
}else{
  echo "Error";
}
//============================================================================//

class usuarioController{
  function switchType($type){
    switch ($_POST['type']) {
      case '':
        break;
      default:
        return 'Error';
        break;
    }
  }
}
?>
