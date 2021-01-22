<?php

class LoginModel extends BaseModel {
  public function __construct() {
    parent::__construct();
  }

  public function login($username, $password, $type) {
    $stmt = $this->db->prepare($this->buildQuery($type));
    $stmt->execute([':username' => $username, ':password' => sha1($password)]);

    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $hasData = $stmt->rowCount();

    if ($hasData > 0) {
      $this->setSessionVariables($data, $type);

      header('Location: ' . BASE_URL . '/students/get?message=' . urlencode('login successful'));
    } else {
      header('Location: ' . BASE_URL . '/login/index?message=' . urlencode('login failed'));
    }
  }

  private function buildQuery($type) {
    $id = "{$type}_id";
    $table = "{$type}s"; // Add trailing s to match table names "students" and "admins"

    return "SELECT $id, username FROM $table WHERE username = :username AND 
      password = :password";
  }

  private function setSessionVariables($data, $type) {
    Session::set('logged_in', true);
    Session::set('username', $data['username']);
    Session::set('role', $type);
    Session::set('student_id', $data["{$type}_id"]);
  }
}