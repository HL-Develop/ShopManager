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
                  <input name="proveedor" id="proveedor" type="text" required class="form-control">
                  <span class="input-group-addon">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </span>
                </div>
            </div>
              <div class="col-lg-3 col-md-3 col-md-offset-3">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    Total Venta
                  </div>
                  <div class="panel-body">
                    <h1>$ 500.00</h1>
                  </div>
                </div>
              </div>
          </div>
          <hr/>
          <!-- Tabla de venta -->
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <table class="table table-striped table-bordered table-hover">
                <caption>Nota de venta</caption>
                <thead>
                  <tr>
                    <th class="th-center">Cantidad</th>
                    <th class="th-center">Codigo</th>
                    <th class="th-center">Descripcion</th>
                    <th class="th-center">Precio Unitario</th>
                    <th class="th-center">Total</th>
                    <th class="th-center">Eliminar</th
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="td-center">1</td>
                    <td class="td-center">75004699</td>
                    <td>Coca Cola 500-ml Vidrio</td>
                    <td>$ 8.00</td>
                    <td>$ 8.00</td>
                    <td class="td-center eliminar-tupla"><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!--Botón de guardar-->
          <div class="row">
            <div class="col-lg-4 col-md-4 col-md-offset-8">
                <div class="form-group">
                  <label></label>
                  <button name="save-btn" id="save-btn" type="submit"  class="btn btn-primary btn-lg btn-block pull-right">
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
