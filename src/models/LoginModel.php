<?php

class LoginModel extends BaseModel {
  public function __construct() {
    parent::__construct();
  }

  public function login($username, $password) {
    $stmt = $this->db->prepare("SELECT username FROM students WHERE username = :username 
      AND password = :password");

    $stmt->execute([':username' => $username, ':password' => sha1($password)]);

    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $hasData = $stmt->rowCount();

    if ($hasData > 0) {
      Session::set('logged_in', true);
      Session::set('username', $data['username']);
      Session::set('role', 'student');
      Session::set('student_id', $data['student_id']);

      header('Location: ' . BASE_URL . '/students/get?message=' . urlencode('login successful'));
    } else {
      header('Location: ' . BASE_URL . '/login/index?message=' . urlencode('login failed'));
    }
  }
}