<?php

class CoursesModel extends BaseModel {
  public function __construct() {
    parent::__construct();
  }

  public function getCourses() {
    return $this->db->query("SELECT course_id, name, description 
      FROM courses")->fetchAll(PDO::FETCH_ASSOC);
  }

  public function addCourse($course) {
    $columns = implode(', ', array_keys($course));
    $values = ':' . implode(', :', array_keys($course));

    $stmt = $this->db->prepare("INSERT INTO courses ({$columns}) VALUES ({$values})");
    foreach ($course as $key => $value) {
      $stmt->bindValue(":{$key}", $value);
    }

    $stmt->execute();

    return $this->db->lastInsertId();
  }
}