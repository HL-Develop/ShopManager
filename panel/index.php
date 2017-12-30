<?php
  session_start();
  if(isset($_SESSION['usuario'])){
?>
<!DOCTYPE html>
<html>
  <?php include($_SERVER['DOCUMENT_ROOT'].'/ShopManager/panel/modules/head.php'); ?>
  <body>
    <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT'].'/ShopManager/panel/modules/menu.php'); ?>
      <div id="page-wrapper" >
        <div id="page-inner">
          <div class="row">
            <div class="col-md-12">
              <h2>Inicio</h2>
            </div>
          </div>
          <hr />
          <div class="row">
            <div class="col-md-12">
              <h3>Contenido aquí</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/ShopManager/panel/modules/footer.php'); ?>
  </body>
</html>
<?php
  }else{
    header("Location: /ShopManager/");  
  }
?>
