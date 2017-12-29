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
                    <input type="text" class="form-control" placeholder="Usuario">
                  </div>

                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    <input type="password" class="form-control" placeholder="Contraseña">
                  </div>
                  <a href="#" class="btn btn-primary pull-right">Entrar</a>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </body>
</html>
