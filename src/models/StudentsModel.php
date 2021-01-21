<?php

class StudentsModel extends BaseModel {
  public function __construct() {
    parent::__construct();
  }

  public function getStudents() {
    return $this->db->query("SELECT student_id, first_name, last_name 
      FROM students")->fetchAll(PDO::FETCH_ASSOC);
  }

  public function addStudent($student): string {
    $columns = implode(', ', array_keys($student));
    $values = ':' . implode(', :', array_keys($student));

    $stmt = $this->db->prepare("INSERT INTO students ({$columns}) VALUES ({$values});");
    foreach ($student as $key => $value) {
      $stmt->bindValue(":{$key}", $value);
    }

    $stmt->execute();

    return $this->db->lastInsertId();
  }
}