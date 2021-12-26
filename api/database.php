<?php

class Database {

  private static $database;
  private static $pdo;

  private function __construct() {  }

  public static function getInstance() {

    if(!isset(self::$database)) {
      assert(isset(self::$pdo), "initialization error");
      self::$database = new Database();
    }

    return self::$database;
  }

  public static function setOptions($dsn, $username, $password) {

    $options = [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION
    ];

    self::$pdo = new PDO($dsn, $username, $password, $options);
  }

  public static function setInstance($database) {
    self::$database = $database;
  }

  public function transaction($func) {

    self::$pdo->beginTransaction();

    try {
      $func();
      self::$pdo->commit();
    } catch(Exception $e) {
      self::$pdo->rollBack();
      throw $e;
    }
  }

}
