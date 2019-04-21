<?php
class libraryController extends BaseController {

  public function __construct () {
    if(empty($_SESSION['cLogin'])) {
      header("Location: ".BASE_URL.'sessions');
      exit;
    }
  }

  public function index () {

    $categories = new Category();
    $books = new Books();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $title = filter_input(INPUT_POST, 'title');
      $author = filter_input(INPUT_POST, 'author');
      $category = filter_input(INPUT_POST, 'category');
      $description = filter_input(INPUT_POST, 'description');

      $book = $books->create($title, $author, $description, $category);
      
    }
  
    $data = array(
      'categories'    => $categories->getCategories(),
      'userBooks'     =>  $books->getUsersBooksOwner(),
      'myLibrary'     => $books->getBooksLibrary(),
    );

    $this->loadTemplate('library', $data);
  
  }

  public function add ($book_id) {

    $library = new Library();

    $library->create($book_id);

    header("Location: ".BASE_URL);
    exit;

  }

  public function remove ($book_id, $redirect = 'library') {

    $library = new Library();

    $library->delete($book_id);

    header("Location: ".BASE_URL.$redirect);
    exit;

  }

}