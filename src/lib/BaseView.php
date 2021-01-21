<?php

class BaseView {
  public function __construct() {}

  public function render($name) {
    require_once SRC_DIR . '/views/layout/header.php';
    require_once SRC_DIR . "/views/{$name}.php";
    require_once SRC_DIR . '/views/layout/footer.php';
  }
}