<?php
class searchController extends BaseController {

  public function __construct () {
    if(empty($_SESSION['cLogin'])) {
      header("Location: ".BASE_URL.'sessions');
      exit;
    }
  }

  public function index () {

    $categories = new Category();
    $book = new Books();
    $search = '';
    
    $books = $book->getAll();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $category = filter_input(INPUT_GET, 'c');
      $type = filter_input(INPUT_GET, 't');
      $search = filter_input(INPUT_GET, 's');

      $category = (int)$category??null;
      $type = $type??'title';

      $url = '&t='.$type.'&s='.$search;

      $books = $book->getBy($category, $type, $search);
      
    }

    $book_ids = [];

    $myLibrary = $book->getBooksLibrary();
    foreach ($myLibrary as $book) {
      $book_ids[] = $book['book_id'];
    }

    $data = array(
      'name'          => 'zaqueu',
      'categories'    => $categories->getCategories(),
      'myLibrary'     => $book_ids,
      'books'         => $books,
      'url'           => $url,
      'search'        => $search,
      'type'          => $type
    );

    $this->loadTemplate('search', $data);

  }

}