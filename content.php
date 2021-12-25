<?php

class Content {

  private static $content;

  private function __construct() {  }

  public static function getInstance() {

    if(!isset(self::$content)) {
      $json = file_get_contents("php://input");
      self::$content = json_decode($json, true);
    }

    return self::$content;
  }

  public static function setInstance($content) {
    self::$content = $content;
  }

}
