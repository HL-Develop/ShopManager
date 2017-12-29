<?php
  require($_SERVER['DOCUMENT_ROOT'].'/ShopManager/controllers/route.php');
  $route = new routes();
  $modulo = $route->getModulo($_SERVER['REQUEST_URI']);
?>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="adjust-nav">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img src="/ShopManager/panel/img/logo.png" />
      </a>
    </div>
    <span class="logout-spn" >
      <a href="logout.php" style="color:#fff;"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a>
    </span>
  </div>
</div>
<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav" id="main-menu">
      <li <?php echo $route->isActive($modulo,'');?>>
        <a href="/ShopManager/panel/" ><i class="fa fa-home "></i>Inicio</a>
      </li>
      <li <?php echo $route->isActive($modulo,'Productos');?>>
        <a href="/ShopManager/panel/productos/"><i class="fa fa-cubes "></i>Productos</a>
      </li>
      <li <?php echo $route->isActive($modulo,'Examples');?>>
        <a href="/ShopManager/panel/examples.php"><i class="fa fa-table "></i>Examples</a>
      </li>
      <li <?php echo $route->isActive($modulo,'Blank');?>>
        <a href="/ShopManager/panel/blank.php"><i class="fa fa-edit "></i>Blank Page</a>
      </li>
    </ul>
  </div>
</nav>
