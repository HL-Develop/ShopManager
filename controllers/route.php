<?php
  class routes{

    function getModulo($url){
      $url = str_replace('/ShopManager/panel/','',$url);
      $url = str_replace('.php','',$url);
      $url = str_replace('.html','',$url);
      $url = str_replace('/','',$url);
      $url = ($url=='') ? 'Inicio' : $url ;
      return ucwords($url);
    }
    function isActive($modulo,$link){
      if($modulo==$link){
        return 'class="active-link"';
      }else{
        return '';
      }
    }

  }
?>
