<?php

require_once "session.php";
require_once "content.php";
require_once "message.php";
require_once "userrepository.php";

class Api {

  public static function authentication($matches) {

    $session = Session::getInstance();
    $content = Content::getInstance();
    $message = Message::getInstance();
    $userRepository = UserRepository::getInstance();

    $session->start();

    $user = $userRepository->getUserByEmail($content->getEmail());

    if (!$user) {
      $message->notifyEmailNotFound();
      return;
    }

    if (!$user->authenticate($content->getPassword())) {
      $message->notifyAuthenticationFailed();
      return;
    }

    $session->setId($user->getUserId());
    $message->replyUser($user);
  }

}
