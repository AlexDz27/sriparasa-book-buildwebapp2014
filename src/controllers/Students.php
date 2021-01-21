<?php

class Students extends BaseController {
  public function __construct() {
    parent::__construct();

    $this->loadModel('Students');
  }

  public function get($id = null) {
    $this->view->studentData = $this->model->getStudents();
    $this->view->render('students/get');
  }

  public function add() {
    if (isset($_POST['submit'])) {
      unset($_POST['submit']); // remove 'submit' key to work with data only

      $_SESSION['new_user_id'] = $this->model->addStudent($_POST);
      
      header('Location: /students/add');
      die();
    }

    $this->view->render('students/add');
  }

  public function export() {
    $data = $this->model->getStudents();
    $handle = fopen(PROJECT_DIR . '/public/assets/files/students.csv', 'w+');

    foreach ($data as $student) {
      fputcsv($handle, [$student['student_id'], $student['first_name'], $student['last_name'],
        $student['address'], $student['city'], $student['state']]);
    }
    fclose($handle);

    header('Content-Disposition: attachment;filename="students.csv"');
    header('Content-Type:application/csv');

    readfile(PROJECT_DIR . '/public/assets/files/students.csv');
  }

  public function import() {
    if (isset($_POST['submit'])) {
      if ($_FILES['file']['error'] === 0) {
        if (($handle = fopen($_FILES['file']['tmp_name'], 'r')) !== false) {
          while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            $student = [];

            $student['first_name'] = $data[0];
            $student['last_name'] = $data[1];
            $student['address'] = $data[2];
            $student['city'] = $data[3];
            $student['state'] = $data[4];
            $student['zip_code'] = $data[5];
            $student['username'] = $data[6];
            $student['password'] = $data[7];

            $this->model->addStudent($student);
          }
        }

        header('Location: ' . BASE_URL . '/students/get?message=importSuccess');
      }
    }
  }
}