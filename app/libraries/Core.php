<?php

class Core {

 protected $currentController ='home';
 protected $currentMethod ='index';
 protected $params =[];

 public function __construct(){
  // print_r($this->getUrl()); 
  $url = $this->getUrl();
 
  if (isset($url) && is_array($url) && !empty($url) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
  $this->currentController = ucwords($url[0]);

    unset($url[0]);
  }else{
    if(is_array($url) && count($url) > 0){
      $this->currentController = '_404';
    }
  }


  // Require the controller
  require_once '../app/controllers/'.$this->currentController.'.php';
  

  // // instantiate Controller class

  $this->currentController =  new $this->currentController;

// check url second part
if(isset($url[1])){

 if(method_exists($this->currentController,$url[1])){
  $this->currentMethod=$url[1];
  unset($url[1]);
 }else {
    // Require the controller
    require_once '../app/controllers/_404.php';
    $this->currentController = new _404; 
}
}

$this->params = $url? array_values($url):[];

// call back with array of params

 call_user_func_array([$this->currentController,$this->currentMethod],$this->params);


 }



 public function getUrl(){
  if(isset($_GET['url'])){
   $url =rtrim($_GET['url'],'/');
   $url =filter_var($url ,FILTER_SANITIZE_URL);
   $url =explode('/',$url);
   return $url;
  }
 }

  
}


?>