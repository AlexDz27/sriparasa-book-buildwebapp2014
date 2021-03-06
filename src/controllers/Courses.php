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
    $role = Session::get('role');

    if ($role && $role !== 'student') {
      if (isset($_POST['submit'])) {
        unset($_POST['submit']);
        $this->view->id = $this->model->addCourse($_POST);
      }

      $this->view->render('courses/add');
    } else {
      header('Location: ' . BASE_URL . '/students/get?message=' . urlencode(
        'Unauthorized users or students cannot add courses'));
    }

    if (isset($_POST['submit'])) {
      unset($_POST['submit']); unset($_POST['submit']); // remove 'submit' key to work with data only

      $_SESSION['new_course_id'] = $this->model->addCourse($_POST);

      header('Location: /courses/add');
      die();
    }

    $this->view->render('courses/add');
  }
}