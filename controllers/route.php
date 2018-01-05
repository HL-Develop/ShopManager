<?php
  class routes{

    function getModulo($url){
      $url = str_replace('/ShopManager/panel/','',$url);
      $url = str_replace('.php','',$url);
      $url = str_replace('.html','',$url);

      $array = explode('/',$url);
      $url=$array[0];
      $url = ($url=='') ? 'Inicio' : $url ;
      return ucwords($url);
    }
    function isActive($urlMmodulo,$menuModulo){
      if($urlMmodulo==$menuModulo){
        return 'class="active-link"';
      }else{
        return '';
      }
    }

  }
?>
