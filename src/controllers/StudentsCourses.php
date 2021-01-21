<?php

class StudentsCourses extends BaseController {
  public function __construct() {
    parent::__construct();

    $this->loadModel('StudentsCourses');
  }

  public function get() {
    $this->view->studentsCoursesData = $this->model->getStudentsCourses();

    $this->view->render('studentsCourses/get');
  }

  public function register() {
    if (isset($_POST['submit'])) {
      unset($_POST['submit']);

      $studentId = $_POST['student_id'];
      $courseId = $_POST['course_id'];

      $_SESSION['is_new_students_courses_created'] = $this->model->registerStudentCourse($studentId, $courseId);

      header('Location: /studentsCourses/register');
      die();
    }

    $this->view->render('studentsCourses/register');
  }
}