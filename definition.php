<?php

# API specification
# https://jsonapi.org/

require_once "router.php";
require_once "session.php";

Router::POST('/authentication', function($matches) {

  $session = Session::getInstance();
  $content = Content::getInstance();
  $message = Message::getInstance();
  $userRepository = UserRepository::getInstance();

  $session->start();

  $user = $userRepository->getUserByEmail($content['email']);

  if (!$user) {
    $message->notifyEmailNotFound();
    return;
  }

  if (!$user->authenticate($content['password'])) {
    $message->notifyAuthenticationFailed();
    return;
  }

  $session->setId($user->getUserId());
  $message->replyUser($user)

});

