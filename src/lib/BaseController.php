<?php

abstract class BaseController {
  protected $view;
  protected $model;

  public function __construct() {
    $this->view = new BaseView();
  }

  public function loadModel($name) {
    $path = SRC_DIR . "/models/{$name}Model.php";

    if (file_exists($path)) {
      require_once $path;

      $modelName = "{$name}Model";
      $this->model = new $modelName();
    }
  }
}