<?php

class Courses extends BaseController {
  public function __construct() {
    parent::__construct();

    $this->loadModel('Courses');
  }

  public function get($id = null) {
    $this->view->courseData = $this->model->getCourses();
    $this->view->render('courses/get');
  }

  public function add() {
    if (isset($_POST['submit'])) {
      unset($_POST['submit']); unset($_POST['submit']); // remove 'submit' key to work with data only

      $_SESSION['new_course_id'] = $this->model->addCourse($_POST);

      header('Location: /courses/add');
      die();
    }

    $this->view->render('courses/add');
  }
}