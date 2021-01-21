<?php

class StudentsCoursesModel extends BaseModel {
  public function __construct() {
    parent::__construct();
  }

  public function getStudentsCourses() {
    $stmt = $this->db->prepare("SELECT s.first_name, s.last_name, s.student_id,
      c.course_id, c.name as course_name FROM students_courses sc JOIN students s ON 
      sc.student_id = s.student_id JOIN courses c ON sc.course_id = c.course_id");

    $stmt->execute();

    $studentsCourses = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $studentsCourses[] = $row;
    }

    return $studentsCourses;
  }

  public function registerStudentCourse($studentId, $courseId): bool {
    $stmt = $this->db->prepare("INSERT INTO students_courses (student_id, course_id) 
      VALUES (:student_id, :course_id)");

    $stmt->bindValue(':student_id', $studentId);
    $stmt->bindValue(':course_id', $courseId);

    return $stmt->execute();
  }
}