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
    $datos = $producto->datosProducto($_GET['pro']);
  ?>
  <body>
    <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT'].'/ShopManager/panel/modules/menu.php'); ?>
      <div id="page-wrapper" >
        <div id="page-inner">
          <div class="row">
            <div class="col-md-12">
              <h2>Modificar Producto</h2>
            </div>
          </div>
          <hr />

          <!-- formulario de captura -->
          <form  action="POST" name="producto-modificar-form" id="producto-modificar-form">
            <div class="row">
              <div class="col-lg-4 col-md-4">
                <div class="form-group">
                  <label>Categoria</label>
                  <select name="categoria" id="categoria" required class="form-control">
                    <option>Seleccionar...</option>
                    <?php
                      while($c = $categorias->fetch_assoc()){
                    ?>
                      <option name="categoria" value="<?php echo $c['id']; ?>" <?php if($datos['cid']==$c['id'])echo "selected";?> >
                        <?php echo $c['nombre']; ?>
                      </option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
              </div>
              <input id="id"  type="hidden" value="<?php echo $datos['pid'];?>" required >
              <div class="col-lg-4 col-md-4">
                <div class="form-group">
                  <label>Código</label>
                  <input name="codigo" id="codigo" class="form-control" type="text" placeholder="Ingrese código de barras" value="<?php echo $datos['codigo'];?>" required >
                </div>
              </div>
            </div>

            <div class="row">
            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <label>Descripción</label>
                <input name="descripcion" id="descripcion" class="form-control" type="text" placeholder="Nombre del producto"  value="<?php echo $datos['descripcion'];?>" required >
              </div>
            </div>

            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <label>Precio</label>
                <input name="precio" id="precio" class="form-control" type="number" min="0" step="any" placeholder="0.00" value="<?php echo $datos['precio'];?>" required >
              </div>
            </div>

            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <label></label>
                <button name="" id="producto-modificar" type="submit"  class="btn btn-primary btn-lg btn-block">
                  <i class="fa fa-save" aria-hidden="true"></i> Guardar cambios
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
