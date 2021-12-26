<?php

require_once "./session.php";
require_once "./database.php";

header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Origin: " . $_SERVER["HTTP_ORIGIN"]);
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

$session = Session::getInstance();
$session->start();

require_once "./definition.php";
