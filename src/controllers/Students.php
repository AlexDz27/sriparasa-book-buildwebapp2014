<?php

class Students extends BaseController {
  public function __construct() {
    parent::__construct();

    $this->loadModel('Students');
  }

  public function add() {
    if (isset($_POST['submit'])) {
      unset($_POST['submit']); // remove 'submit' key to work with student data only

      $_SESSION['new_user_id'] = $this->model->addStudent($_POST);
      
      header('Location: /students/add');
      die();
    }

    $this->view->render('students/add');
  }

  public function get($id = null) {
    echo 'get from Students Controller!';
  }
}