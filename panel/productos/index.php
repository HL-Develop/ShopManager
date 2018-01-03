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
            <div class="col-lg-4 col-md-4">
                <label>Producto</label>
                <div class="input-group">
                  <input name="proveedor" id="proveedor" type="text" required class="form-control">
                  <span class="input-group-addon">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </span>
                </div>
            </div>
              <div class="row">
                <div class="col-lg-12 col-md-6">
                  <table class="table table-striped table-bordered table-hover">
                    <caption>Lista de productos</caption>
                    <thead>
                      <tr>
                        <th class="th-center">Stock</th>
                        <th class="th-center">Codigo</th>
                        <th class="th-center">Descripcion</th>
                        <th class="th-center">Precio </th>
                        <th class="th-center">categoria</th>
                        <th class="th-center">modificar</th
                        <th class="th-center">eliminar</th
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="td-center">35</td>
                        <td class="td-center">75004699</td>
                        <td>Coca Cola 500-ml Vidrio</td>
                        <td>$ 8.00</td>
                        <td>Refrescos</td>
                        <td class="td-center"><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
                      </tr>
                    </tbody>
                  </table>
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
