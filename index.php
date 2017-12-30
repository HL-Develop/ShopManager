<?php
  session_start();
  if(!isset($_SESSION['usuario'])){
?>
<!DOCTYPE html>
<html>
  <?php include($_SERVER['DOCUMENT_ROOT'].'/ShopManager/panel/modules/head.php'); ?>
  <body id="login">
    <div id="wrapper">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-md-offset-4">
          <h1 class="login">ShopManager</h1>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-4 col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h1><i class="fa fa-sign-in" aria-hidden="true"></i> Login</h1>
              </div>
              <div class="panel-body">
                <form class="" action="index.html" method="post">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                    <input id="usuario" type="text" class="form-control" placeholder="Usuario" required>
                  </div>

                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    <input id="password" type="password" class="form-control" placeholder="Contraseña" required>
                  </div>
                  <button type="submit" id="sendLogin" class="btn btn-primary pull-right">Entrar</button>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="/ShopManager/panel/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="/ShopManager/panel/js/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="/ShopManager/panel/js/custom.js"></script>
    <!-- ALERTIFY SCRIPTS -->
    <script src="/ShopManager/panel/js/alertify.min.js"></script>
    <!-- FUNCTION SCRIPTS -->
    <script src="/ShopManager/panel/js/function.js"></script>
  </body>
</html>
<?php
  }else{
    header("Location: /ShopManager/panel/");
  }
?>
