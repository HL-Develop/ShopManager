<?php
  session_start();
  if(isset($_SESSION['usuario'])){
?>
﻿<!DOCTYPE html>
<html>
  <?php include($_SERVER['DOCUMENT_ROOT'].'/ShopManager/panel/modules/head.php'); ?>
  <body>
    <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT'].'/ShopManager/panel/modules/menu.php'); ?>
      <div id="page-wrapper" >
        <div id="page-inner">
          <div class="row">
            <div class="col-md-12">
              <h2>Entradas</h2>
            </div>
          </div>
              <hr>
                <div class="row">
                  <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                      <label>Proveedor</label>
                      <input name="proveedor" id="" type="text" required class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Proveedor</label>
                      <input name="proveedor" id="" type="text" required class="form-control">
                    </div>
                  </div>
                </div>
        </div>
              <hr>
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Cantidad</th>
                          <th>Codigo</th>
                          <th>Descripcion</th>
                          <th>Precio Un</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>75004699</td>
                          <td>Coca Cola 500-ml Vidrio</td>
                          <td>$ 8.00</td>
                          <td>$ 8.00</td>
                        </tr>
                      </tbody>
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
