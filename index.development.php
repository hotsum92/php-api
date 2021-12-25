<?php

require_once "./session.php";
require_once "./database.php";

Database::setOptions("mysql:dbname=axisplan_liquor_statistics;host=127.0.0.1;charset=utf8;", "root", "");

header("Access-Control-Allow-Credentials: true");
if(isset($_SERVER["HTTP_ORIGIN"])) {
  header("Access-Control-Allow-Origin: " . $_SERVER["HTTP_ORIGIN"]);
}
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

Session::setMock();
$session = Session::getInstance();
$session->start();

require_once "./definition.php";
