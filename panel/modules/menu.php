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
      <a id="sendLogout" href="#" style="color:#fff;"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a>
    </span>
  </div>
</div>
<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav" id="main-menu">
      <li>
        <a href="#">
          <i class="fa fa-chevron-right" aria-hidden="true"></i>
          <?php echo $_SESSION['usuario']; ?>
          <br/>
          <i class="fa fa-chevron-right" aria-hidden="true"></i>
          <?php echo $_SESSION['roll']; ?>
        </a>
      </li>
      <li <?php echo $route->isActive($modulo,'Inicio');?>>
        <a href="/ShopManager/panel/" ><i class="fa fa-home "></i>Inicio</a>
      </li>
      <li <?php echo $route->isActive($modulo,'Productos');?>>
        <a href="/ShopManager/panel/productos/"><i class="fa fa-cubes "></i>Productos</a>
      </li>
      <li <?php echo $route->isActive($modulo,'Ventas');?>>
        <a href="/ShopManager/panel/ventas/"><i class="fa fa-money"></i>Ventas</a>
      </li>
      <li <?php echo $route->isActive($modulo,'Entradas');?>>
        <a href="/ShopManager/panel/entradas/"><i class="fa fa-file-text "></i>Entradas</a>
      </li>
    </ul>
  </div>
</nav>
