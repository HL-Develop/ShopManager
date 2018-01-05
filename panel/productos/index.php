<?php
  session_start();
  if(isset($_SESSION['usuario'])){
?>
﻿<!DOCTYPE html>
<html>
  <?php
    include($_SERVER['DOCUMENT_ROOT'].'/ShopManager/panel/modules/head.php');
    include($_SERVER['DOCUMENT_ROOT'].'/ShopManager/controllers/producto.php');
    $producto = new ProductoController();
    $lista = $producto->listarProductosActivos();
    $categorias = $producto->listarCategoriasActivas();
  ?>
  <body>
    <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT'].'/ShopManager/panel/modules/menu.php'); ?>
      <div id="page-wrapper" >
        <div id="page-inner">
          <div class="row">
            <div class="col-lg-4 col-md-4">
              <h1>Productos</h1>
            </div>
          </div>
          <hr/>
          <div class="row">

            <div class="col-lg-8 col-md-8">
              <div class="form-group">
                <div class="col-lg-6 col-md-6">
                  <select name="buscar-categoria" id="buscar-categoria" class="form-control" required >
                    <option name="buscar-categoria" value="0">Todas las categorias</option>
                    <?php while($c = $categorias->fetch_assoc()){ ?>
                      <option name="buscar-categoria" value="<?php echo $c['id']; ?>">Solo <?php echo $c['nombre']; ?></option>
                    <?php   }   ?>
                  </select>
                </div>
                <div class="input-group">
                  <input name="buscar-producto" id="buscar-producto" class="form-control" type="text" placeholder="Ingrese nombre o código" required >
                  <span class="input-group-addon buscar-producto">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </span>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-4">
              <div class="input-group">
                <button id="ir-nuevo-producto" type="submit"  class="btn btn-primary btn-lg btn-block pull-right">
                  <i class="fa fa-plus" aria-hidden="true"></i> Agregar Producto
                </button>
              </div>
            </div>

          </div>
          <hr/>
          <?php
            if($lista==false){
          ?>
          <label>No hay productos </label>
          <?php
            }else{
          ?>
          <div class="row">
            <div class="col-lg-12 col-md-12 table-responsive-sm">
              <table class="table table-striped table-bordered table-hover">
                <caption>Lista de productos</caption>
                <thead>
                  <tr>
                    <th class="th-center">Categoria</th>
                    <th class="th-center">Codigo</th>
                    <th class="th-center">Descripción</th>
                    <th class="th-center">Precio </th>
                    <th class="th-center">Stock</th>
                    <th class="th-center">modificar</th>
                    <th class="th-center">eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      while ($fila=$lista->fetch_assoc()) {
                  ?>
                  <tr>
                    <td><?php echo $fila['categoria']; ?></td>
                    <td class="td-center"><?php echo $fila['codigo']; ?></td>
                    <td id="descripcion-<?php echo $fila['id']; ?>"><?php echo $fila['descripcion']; ?></td>
                    <td>$ <?php echo $fila['precio']; ?></td>
                    <td class="td-center"><?php echo $fila['stock']; ?></td>
                    <td class="td-center">
                      <i id="<?php echo $fila['id']; ?>" class="fa fa-pencil text-warning ir-producto-editar" aria-hidden="true"></i>
                    </td>
                    <td class="td-center">
                      <i id="<?php echo $fila['id']; ?>" class="fa fa-times text-danger producto-eliminar" aria-hidden="true"></i>
                    </td>
                  </tr>
                  <?php
                      }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <?php } ?>
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
