<?php
class homeController extends BaseController {

  public function __construct () {
    if(empty($_SESSION['cLogin'])) {
      header("Location: ".BASE_URL.'sessions');
      exit;
    }
  }

  public function index () {

    $users = new Users();
    $categories = new Category();
    $books = new Books();
    $book_ids = [];

    $myLibrary = $books->getBooksLibrary();
    foreach ($myLibrary as $book) {
      $book_ids[] = $book['book_id'];
    }

    $data = array(
      'name'          => 'zaqueu',
      'categories'    => $categories->getCategories(),
      'books'         => $books->getAll(),
      'myLibrary'     => $book_ids,
    );

    $this->loadTemplate('home', $data);

  }

}