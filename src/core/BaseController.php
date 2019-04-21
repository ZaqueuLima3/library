<?php
class BaseController {

  public function loadView ($view, $data = array()) {
   
    extract($data);
    require '../src/views/'.$view.'.php';

  }

  public function loadTemplate ($view, $data = array()) {
   
    require '../src/views/template.php';
    
  }

  public function loadViewInTemplate ($view, $data = array()) {
    
    extract($data);
    require '../src/views/'.$view.'.php';

  }
  
}