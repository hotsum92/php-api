<?php

require_once "database.php";
require_once "user.php";

class UserRepository {

  private static $userRespository;
  private static $database;

  private function __construct() {
    self::$database = Database::getInstance();
  }

  public static function getInstance() {

    if(!isset(self::$userRespository)) {
      self::$userRespository = new UserRepository();
    }

    return self::$userRespository;
  }

  public static function setInstance($userRespository) {
    self::$userRespository = $userRespository;
  }

  public function getUserByEmail($email) {
    $st = self::$database->prepare("
      SELECT user_id,
             name,
             email,
             password
        FROM user
       WHERE email = :email
    ");

    $st->bindValue(":email", $email, PDO::PARAM_STR);

    $st->execute();

    $data = $st->fetch();

    if(!$data) {
      return null;
    }

    return new User(
      $data['user_id'],
      $data['name'],
      $data['email'],
      $data['password']
    );

  }

}
