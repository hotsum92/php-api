<?php

require_once "api.php";

require_once "session.php";
require_once "content.php";
require_once "message.php";
require_once "userrepository.php";

require_once "user.php";

class ApiTest {

  public function testAuthentication() {

    Session::setInstance(new MockSession());
    Content::setInstance(new MockContent());
    Message::setInstance(new MockMessage());
    UserRepository::setInstance(new MockUserRepository());

    Api::authentication(array());

  }

}

$test = new ApiTest();

foreach(get_class_methods($test) as $method) {
  call_user_func(array($test, $method));
}

class MockSession {
  public function start() {}
  public function setId($id) {}
  public function getId() { return ""; }
}

class MockContent {
  public function getEmail() { return "email"; }
  public function getPassword() { return "password"; }
}

class MockMessage {
  public function notifyEmailNotFound() { echo "notify the email is not found.\n"; }
  public function notifyAuthenticationFailed() { echo "notify the authentication is failed.\n"; }
  public function replyUser($user) { echo "authentication test successed \n"; }
}

class MockUserRepository {
  public function getUserByEmail($email) { return new User("userId", "name", "email", "password"); }
}
