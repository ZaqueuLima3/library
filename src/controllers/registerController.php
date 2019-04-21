<?php
class registerController extends BaseController {

  public function index () {

    $user = new Users();
    $data = array();
    $created = false;
    $isCreated = false;
    $username= ''; $email= ''; $password = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $username = filter_input(INPUT_POST, 'username');
      $email = filter_input(INPUT_POST, 'email');
      $password = filter_input(INPUT_POST, 'password');

      if ( !empty($username) && !empty($email) && !empty($password) ) {
        if ($user->create($username, $email, $password)) {
          $created = true;
          $isCreated = true;
        } else {
          $created = true;
          $isCreated = false;
        }
      }
    }

    $data = [
      'created'     => $created,
      'isCreated'   => $isCreated
    ];
    
    $this->loadTemplate('register', $data);

  }


}