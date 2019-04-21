<?php
class Users extends BaseModel {

  public function create ($username, $email, $password) {

    $sql = "SELECT id FROM users WHERE email = ?";
    $sql = $this->db->prepare($sql);
    $sql->execute(array(
      $email
    ));

    if ($sql->rowCount() > 0) return false;

    $sql = "INSERT INTO users SET username = :username, email = :email, password = :password";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":username", $username);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":password", md5($password));
    $sql->execute();

    return true;

  }

  public function login ($email, $password) {
    
    $sql = "SELECT id FROM users WHERE email = :email AND password = :password";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":email", $email);
		$sql->bindValue(":password", md5($password));
    $sql->execute();

    if ($sql->rowCount() === 0) return false;

    $sql = $sql->fetch();
    $_SESSION['cLogin'] = $sql['id'];

    return true;

  }

}