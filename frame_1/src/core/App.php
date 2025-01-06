<?php

class App {
    
  public function __construct() {
    $url = $this->parseUrl(); //解析url
    
    $controllerName = "{$url[0]}Controller";
    if (!file_exists(MVC_CONTROLLERS_DIR . "$controllerName.php"))
        return; //無Controller就去App.php
    require_once MVC_CONTROLLERS_DIR . "$controllerName.php";
    $controller = new $controllerName;
    $methodName = isset($url[1]) ? $url[1] : "index";
    if (!method_exists($controller, $methodName))
        return;
    unset($url[0]); unset($url[1]);
    $params = $url ? array_values($url) : Array();
    call_user_func_array(Array($controller, $methodName), $params);
}
  
  public function parseUrl() {
      if (isset($_GET["url"])) {
          $url = rtrim($_GET["url"], "/");
          $url = explode("/", $url);
          return $url;
      }
  }
  
}