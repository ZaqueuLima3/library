<?php
class Library extends BaseModel {

  public function create ($book_id) {

    $sql = "SELECT * FROM library WHERE user_id = :user_id AND book_id = :book_id";
    $sql = $this->db->prepare($sql);

    $sql->bindValue(':user_id', $this->user_id);
    $sql->bindValue(':book_id', $book_id);

    $sql->execute();

    if ($sql->rowCount() > 0) return false;

    $sql = "INSERT INTO library SET user_id = :user_id, book_id = :book_id";
    $sql = $this->db->prepare($sql);

    $sql->bindValue(':user_id', $this->user_id);
    $sql->bindValue(':book_id', $book_id);

    return $sql->execute();
  }

  public function delete ($book_id) {

    $sql = "DELETE FROM library WHERE book_id = :book_id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":book_id", $book_id);
    
    return $sql->execute();

  }

}