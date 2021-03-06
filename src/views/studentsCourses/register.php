<?php if (isset($_SESSION['is_new_students_courses_created'])): ?>
  <p id="registerStudentCourse">Student has been successfully registered for the course!</p>

  <?php
    unset($_SESSION['is_new_students_courses_created']);
  ?>
<?php endif; ?>

<form class="Frm" action="register" method="post">
  <ul>
    <li>
      <label>Course Id</label>
      <input name="course_id" placeholder="Enter Course Id">
    </li>
    <li>
      <label>Student Id</label>
      <?php if ($this->role !== 'student'): ?>
        <input name="student_id" placeholder="Enter Student Id">
      <?php else: ?>
        <label><?= $this->student_id ?></label>
        <input name="student_id" type="hidden" value="<?= $this->student_id ?>">
      <?php endif; ?>
    </li>
    <li>
      <button type="submit" name="submit">Register Student for course</button>
    </li>
  </ul>
</form>