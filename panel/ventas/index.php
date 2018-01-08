<?php
  session_start();
  if(isset($_SESSION['usuario'])){
?>
﻿<!DOCTYPE html>
<html>
  <?php
    include($_SERVER['DOCUMENT_ROOT'].'/ShopManager/panel/modules/head.php');
  ?>
  <body>
    <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT'].'/ShopManager/panel/modules/menu.php'); ?>
      <div id="page-wrapper" >
        <div id="page-inner">
          <div class="row">
            <div class="col-md-12">
              <h2>Ventas</h2>
            </div>
          </div>
          <hr />
          <!-- formulario de captura -->
          <div class="row">
            <div class="col-lg-4 col-md-4">
                <label>Producto</label>
                <div class="input-group">
                  <input name="producto" id="producto" type="text" required class="form-control">
                  <span class="input-group-addon agregar-venta">
                    <i class="fa fa-plus text-success" aria-hidden="true"></i>
                  </span>
                  <span class="input-group-addon">
                    <i class="fa fa-search text-primary" aria-hidden="true"></i>
                  </span>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-md-offset-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  Total Venta
                </div>
                <div class="panel-body">
                  <h1 id="total-venta">$ 0.00</h1>
                </div>
              </div>
            </div>
          </div>
          <hr/>
          <!-- Tabla de venta -->
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <table id="table-venta" class="table table-striped table-bordered table-hover">
                <caption>Nota de venta</caption>
                <thead>
                  <tr>
                    <th class="th-center">Codigo</th>
                    <th class="th-center">Descripcion</th>
                    <th class="th-center">Cantidad</th>
                    <th class="th-center">Precio Unitario</th>
                    <th class="th-center">Total</th>
                    <th class="th-center">Eliminar</th
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
          <!--Botón de cobrar-->
          <div class="row">
            <div class="col-lg-4 col-md-4 col-md-offset-8">
                <div class="form-group">
                  <label></label>
                  <button name="save-btn" id="save-btn" type="submit"  class="btn btn-primary btn-lg btn-block pull-right btn-vender">
                    <i class="fa fa-usd" aria-hidden="true"></i>  Cobrar
                  </button>
                </div>
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
