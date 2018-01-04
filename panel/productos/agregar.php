<?php
  session_start();
  if(isset($_SESSION['usuario'])){
?>
<!DOCTYPE html>
<html>
  <?php
    include($_SERVER['DOCUMENT_ROOT'].'/ShopManager/panel/modules/head.php');
    include($_SERVER['DOCUMENT_ROOT'].'/ShopManager/controllers/producto.php');
    $producto = new ProductoController();
    $categorias = $producto->listarCategoriasActivas();
  ?>
  <body>
    <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT'].'/ShopManager/panel/modules/menu.php'); ?>
      <div id="page-wrapper" >
        <div id="page-inner">
          <div class="row">
            <div class="col-md-12">
              <h2>Nuevo Producto</h2>
            </div>
          </div>
          <hr />

          <!-- formulario de captura -->
          <form  action="POST" name="producto-agregar-form" id="producto-agregar-form">
            <div class="row">
              <div class="col-lg-4 col-md-4">
                <div class="form-group">
                  <label>Categoria</label>
                  <select name="categoria" id="categoria" required class="form-control">
                    <option>Seleccionar...</option>
                    <?php
                      while($c = $categorias->fetch_assoc()){
                    ?>
                      <option name="categoria" value="<?php echo $c['id']; ?>"><?php echo $c['nombre']; ?></option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="col-lg-4 col-md-4">
                <div class="form-group">
                  <label>Código</label>
                  <input name="codigo" id="codigo" type="text" placeholder="Ingrese código de barras" required class="form-control">
                </div>
              </div>
            </div>

            <div class="row">
            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <label>Descripción</label>
                <input name="descripcion" id="descripcion" type="text" placeholder="Nombre del producto" required class="form-control">
              </div>
            </div>

            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <label>Precio</label>
                <input name="precio" id="precio" type="number" min="0" step="any" placeholder="0.00" required class="form-control">
              </div>
            </div>

            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <label></label>
                <button name="" id="producto-agregar" type="submit"  class="btn btn-primary btn-lg btn-block">
                  <i class="fa fa-plus" aria-hidden="true"></i> Agregar Producto
                </button>
              </div>
            </div>
          </div>
          </form>
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
