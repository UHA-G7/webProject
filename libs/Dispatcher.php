<?php
class Dispatcher {
  function __construct() {
     
      //$setup = false the app is already installed
      $url = isset($_GET['url']) ? explode('/', $_GET['url']) : null;
      //print_r($url); //0 controller, 1 method, autres :paramèttres
      require_once CONTROLLERS .DS . 'ErrorController.php';
      if (empty($url[0])) {  
        // No controler requested => INDEX by default
        require CONTROLLERS . DS . 'IndexController.php';
        $controller = new IndexController();
        $controller->index();
      }else{ 
        //Controller requested
        $controllerName = ucfirst(strtolower($url[0])) . 'Controller';
        if (file_exists(CONTROLLERS . DS . $controllerName . '.php')) {
          //Requested controller exist
          require_once CONTROLLERS . DS . $controllerName . '.php';
          $controller = new $controllerName();
         
          if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
              //Call requested method of requested controller with provided parameter
              $controller->{$url[1]}($url[2]);
            }else{
              //Method provided but does not exist => ERROR
              $controller = new ErrorController();
              $controller->error404();
            }
          }else{
            //No parameter provided to method
            if (isset($url[1])) {
              if (method_exists($controller, $url[1])) {
                //Call requested method of requested controller
                $controller->{$url[1]}();
              }else{
                //Method provided but does not exist => ERROR
                $controller = new ErrorController();
                $controller->error404();
              }
            }else{
              //Controller provided but no method => INDEX method by default
              $controller->index();
            }
          }
        }else{
          //Requested controller does not exist
          $controller = new ErrorController();
          $controller->error404();
        }
      }
      
    }
  
}
?>