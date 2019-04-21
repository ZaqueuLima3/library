<?php
class sessionsController extends BaseController {

  public function index () {

    if(!empty($_SESSION['cLogin'])) {
      header("Location: ".BASE_URL);
      exit;
    }

    $user = new Users();
    $data = array();
    $logged = false;
    $islogged = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = filter_input(INPUT_POST, 'email');
      $password = filter_input(INPUT_POST, 'password');

      if (!empty($email) && !empty($password)) {
        if ($user->login($email, $password)) {
          $logged = true;
          $islogged = true;
        } else {
          $logged = true;
          $islogged = false;

        }
      }
    }

    $data = array (
      'logged'    => $logged,
      'islogged'  => $islogged
    );

    $this->loadTemplate('login', $data);

  }

  public function signout() {

    unset($_SESSION['cLogin']);
    header("Location: ".BASE_URL.'sessions');
    
  }

}