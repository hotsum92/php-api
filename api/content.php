<?php

class Content {

  private static $content;
  private static $dictionary;

  private function __construct() {
    $json = file_get_contents("php://input");
    self::$dictionary = json_decode($json, true);
  }

  public static function getInstance() {

    if(!isset(self::$content)) {
      self::$content = new Content();
    }

    return self::$content;
  }

  public static function setInstance($content) {
    self::$content = $content;
  }

  public function getEmail() {
    return self::$dictionary['data']['attributes']['email'];
  }

  public function getPassword() {
    return self::$dictionary['data']['attributes']['password'];
  }

}
