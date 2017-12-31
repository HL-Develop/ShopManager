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
          <!-- Titulo de la pagina -->
          <div class="row">
            <div class="col-md-12">
              <h2>Entradas</h2>
            </div>
          </div>
          <hr/>
          <!-- formulario de captura -->
          <div class="row">
            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <label>Proveedor</label>
                <input name="proveedor" id="proveedor" type="text" required class="form-control">
              </div>
            </div>

            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <label>Folio</label>
                <input name="folio" id="folio" type="number" min="0" required class="form-control">
              </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <label>Producto</label>
                <div class="input-group">
                  <input name="proveedor" id="proveedor" type="text" required class="form-control">
                  <span class="input-group-addon">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </span>
                </div>
            </div>

          </div>
          <div class="row">
            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <label>Cantidad</label>
                <input name="cantidad" id="cantidad" type="text" min="1" required class="form-control">
              </div>
            </div>

            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <label>Precio</label>
                <input name="precio" id="precio" type="number" step="any" min="0" required class="form-control">
              </div>
            </div>

            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <label></label>
                <button name="proveedor" id="" type="submit"  class="btn btn-primary btn-lg btn-block">
                  <i class="fa fa-plus" aria-hidden="true"></i> Agregar Producto
                </button>
              </div>
            </div>
          </div>
          <hr/>
          <!-- Tabla de facura -->
          <div class="row">
            <div class="col-lg-12 col-md-6">
              <table class="table table-striped table-bordered table-hover">
                <caption>Nota de entrada</caption>
                <thead>
                  <tr>
                    <th class="th-center">Cantidad</th>
                    <th class="th-center">Codigo</th>
                    <th class="th-center">Descripcion</th>
                    <th class="th-center">Precio Un</th>
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
                    <td class="td-center"><i class="fa fa-times text-danger" aria-hidden="true"></i></td>
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
                    <i class="fa fa-save" aria-hidden="true"></i>  Guardar entrada
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
