<?php
class BaseModel {

  protected $db;
  protected $user_id;
  
  public function __construct () {
    
    global $db;

    $this->db = $db;
    $this->user_id = $_SESSION['cLogin']??null;

  } 
  
}