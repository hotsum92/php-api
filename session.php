<?php

class Session {

  private static $session;

  private function __construct() {  }

  public static function getInstance() {

    if(!isset(self::$session)) {
      self::$session = new Session();
    }

    return self::$session;
  }

  public static function setInstance($session) {
    self::$session = $session;
  }

  public function start() {
    session_start();
  }

  public function setId($id) {
    $_SESSION["id"] = $id;
  }

  public function getId() {
    return $_SESSION["id"];
  }
}
