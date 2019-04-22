<?php
class booksController extends BaseController {

  public function __construct () {
    if(empty($_SESSION['cLogin'])) {
      header("Location: ".BASE_URL.'sessions');
      exit;
    }
  }

  public function index () {
  
    
  
  }

  public function update ($id) {

    $book = new Books();
    $categories = new Category();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $title = filter_input(INPUT_POST, 'title');
      $author = filter_input(INPUT_POST, 'author');
      $category = filter_input(INPUT_POST, 'category');
      $description = filter_input(INPUT_POST, 'description');

      $book->update($id, $title, $author, $description, $category);
      
      header("Location: ".BASE_URL.'library');
      exit;
      
    }

    $data = array(
      'book' => $book->getById($id),
      'categories'    => $categories->getCategories(),
    );

    $this->loadTemplate('books-edit', $data);

  }

  public function delete ($id) {

    $book = new books();
    
    $book->delete($id);
    
    header("Location: ".BASE_URL.'library');
    exit;

  }

}
