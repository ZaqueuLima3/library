<?php
class Books extends BaseModel {

  public function create ($title, $author, $description, $category) {

    $sql = "INSERT INTO books SET user_id = :id, title = :title, author = :author,  description = :description, category_id = :category";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":id", $this->user_id);
    $sql->bindValue(":title", $title);
    $sql->bindValue(":author", $author);
    $sql->bindValue(":description", $description);
    $sql->bindValue(":category", $category);
    return $sql->execute();

  }

  public function update ($id, $title, $author, $description, $category) {

    $sql = 
      "UPDATE books 
      SET
      title = :title, 
      author = :author,  
      description = :description, 
      category_id = :category 
      WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":title", $title);
    $sql->bindValue(":author", $author);
    $sql->bindValue(":description", $description);
    $sql->bindValue(":category", $category);
    $sql->bindValue(":id", $id);
    return $sql->execute();    

  }

  public function delete ($id) {

    $sql = "DELETE FROM books WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":id", $id);
    
    return $sql->execute();

  }

  public function getById ($id) {

    $sql = "SELECT * FROM books WHERE id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":id", $this->user_id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
      $sql = $sql->fetch();
      return $sql;
    }

    return [];

  }

  public function getBy ($category, $type, $search) {

    $conditions = '';

    if (!!$category) {
      $conditions .= 'category_id = :category AND ';
    }

    if ($type === 'title') {
      $conditions .= 'title LIKE :search';
    } elseif ($type === 'author') {
      $conditions .= 'author LIKE :search';
    }

    $sql = "SELECT * FROM books WHERE ".$conditions;
    $sql = $this->db->prepare($sql);

    $sql->bindValue(":search", '%'.$search.'%');

    if (!!$category) {
      $sql->bindValue(":category", $category);
    }

    $sql->execute();
    

    if ($sql->rowCount() > 0) {
      $sql = $sql->fetchAll();
      return $sql;
    }

    return [];

  }

  public function getAll () {

    $sql = "SELECT * FROM books";
    $sql = $this->db->query($sql);

    if ($sql->rowCount() > 0) {
      $sql = $sql->fetchAll();
      return $sql;
    }

    return [];

  }

  public function getUsersBooksOwner () {

    $sql = "SELECT * FROM books WHERE user_id = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":id", $this->user_id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
      $sql = $sql->fetchAll();
      return $sql;
    }

    return [];

  }

  public function getBooksLibrary () {

    $sql = 
    "SELECT * FROM books 
      INNER JOIN `library` ON(`library`.book_id = `books`.id AND `library`.user_id = ".$this->user_id.")";

    $sql = $this->db->query($sql);

    if ($sql->rowCount() > 0) {
      $sql = $sql->fetchAll();
      return $sql;
    }


    return [];

  }

}