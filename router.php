<?php

class Router {

  public static function GET($path, $func) {
    if("GET" !== $_SERVER["REQUEST_METHOD"]) return;
    if(!Router::match($path, $_SERVER["REQUEST_URI"], $matches)) return;
    $func($matches);
  }

  public static function PUT($path, $func) {
    if("PUT" !== $_SERVER["REQUEST_METHOD"]) return;
    if(!Router::match($path, $_SERVER["REQUEST_URI"], $matches)) return;
    $func($matches);
  }

  public static function POST($path, $func) {
    if("POST" !== $_SERVER["REQUEST_METHOD"]) return;
    if(!Router::match($path, $_SERVER["REQUEST_URI"], $matches)) return;
    $func($matches);
  }

  public static function DELETE($path, $func) {
    if("DELETE" !== $_SERVER["REQUEST_METHOD"]) return;
    if(!Router::match($path, $_SERVER["REQUEST_URI"], $matches)) return;
    $func($matches);
  }

  private static $basePath = "/api";
  private static $hasMatched = false;

  private static function match($path, $uri, &$matches) {
    if(Router::$hasMatched) return false;
    $uri = str_replace(Router::$basePath, "", $_SERVER["REQUEST_URI"]);
    $uri = strtok($uri, '?');
    $pattern = "#\A" . preg_replace("#:([a-zA-Z0-9_]+)#", "(?<$1>[^/]+?)", $path) . "\z#";
    Router::$hasMatched = preg_match($pattern, $uri, $matches);
    return Router::$hasMatched;
  }

}
