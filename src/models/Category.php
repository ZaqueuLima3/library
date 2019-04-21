<?php
class Category extends BaseModel {

  public function getCategories () {
 
    $sql = "SELECT * FROM category";
    $sql = $this->db->query($sql);

    if ($sql->rowCount() > 0) {
      $sql = $sql->fetchAll();
      return $sql;
    }

    return 0;

  }

}