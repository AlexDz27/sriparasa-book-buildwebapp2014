<?php

abstract class BaseController {
  protected $view;
  protected $model;

  public function __construct() {
    $this->view = new BaseView();
  }

  public function loadModel($name) {
    $path = "models/{$name}Model.php";

    if (file_exists($path)) {
      require_once "models/{$name}Model.php";

      $modelName = ucfirst($name) . 'Model';
      $this->model = new $modelName();
    }
  }
}