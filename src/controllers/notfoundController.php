<?php
class notfounDController extends BaseController {

  public function index () {

    http_response_code(404);
    $this->loadTemplate('notFound');

  }

}