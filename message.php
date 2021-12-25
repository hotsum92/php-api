<?php

require_once "statuscode.php";

class Message {

  private static $message;

  private function __construct() {  }

  public static function getInstance() {

    if(!isset(self::$message)) {
      self::$message = new Message();
    }

    return self::$message;
  }

  public static function setInstance($message) {
    self::$message = $message;
  }

  private static $contentType = 'Content-Type: application/vnd.api+json'

  public function notifyEmailNotFound() {
    http_response_code(StatusCode::$FORBIDDEN);
  }

  public function notifyAuthenticationFailed() {
    http_response_code(StatusCode::$FORBIDDEN);
  }

  public function replyUser($user) {
    header(self::$contentType);
    http_response_code(StatusCode::$OK);
  }

}
