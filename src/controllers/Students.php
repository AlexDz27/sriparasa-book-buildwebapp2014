<?php

class Students extends BaseController {
  public function __construct() {
    parent::__construct();
  }

  public function add() {
    if (isset($_POST['submit'])) {
      unset($_POST['submit']);
      $this->view->id = $this->model->addStudent($_POST);
    }

    $this->view->render('students/add');
  }

  public function get($id = null) {
    echo 'get from Students Controller!';
  }
}