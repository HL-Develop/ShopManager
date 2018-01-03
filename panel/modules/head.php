<?php
  require($_SERVER['DOCUMENT_ROOT'].'/ShopManager/controllers/route.php');
  $route = new routes();
  $modulo = $route->getModulo($_SERVER['REQUEST_URI']);
?>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SM | <?php echo $modulo;?></title>
	<!-- BOOTSTRAP STYLES-->
  <link href="/ShopManager/panel/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="/ShopManager/panel/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="/ShopManager/panel/css/custom.css" rel="stylesheet" />
  <!-- ALERTIFY STYLES-->
  <link href="/ShopManager/panel/css/alertify.min.css" rel="stylesheet" />
  <link href="/ShopManager/panel/css/themes/default.min.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
