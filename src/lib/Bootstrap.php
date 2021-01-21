<?php

// TODO: mb refactor by the comments inside

class Bootstrap {
  public function __construct() {
    session_start();

    $uri = ltrim($_SERVER['REQUEST_URI'], '/');
    $uri = explode('/', $uri);

    // should be logged
    // if a controller is not mentioned

    // mb rewrite with list() ?
    if (empty($uri[0])) {
      require_once '../src/controllers/Students.php';
      (new Students())->get();

      return false;
    }

    $controllerName = ucfirst($uri[0]);
    $fileName = "../src/controllers/{$controllerName}.php";

    // should be logged
    if (!file_exists($fileName)) {
      // replace the message
      // redirect user to custom 404 page
      echo 'File does not exist';

      return false;
    }

    require_once $fileName;
    $controller = new $controllerName;

    $actionName = $uri[1] ?? null;

    if ($actionName === null) {
      $controller->get();

      return false;
    }
    
    if (method_exists($controller, $actionName)) {
      if (empty($uri[2])) {
        $controller->{$uri[1]}();
      } else {
        $controller->{$uri[1]}($uri[2]);
      }
    } else {
      // should be logged
      // replace the message
      // redirect the user to custom 404 page
      echo 'Action does not exist';
    }
  }
}