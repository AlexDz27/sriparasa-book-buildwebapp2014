<?php if (isset($_SESSION['new_course_id'])): ?>
  <p id="addCourse">New course has been successfully added!</p>

  <?php
    unset($_SESSION['new_course_id']);
  ?>
<?php endif; ?>

<form class="Frm" action="add" method="post">
  <ul>
    <li>
      <label>Course Name</label>
      <input name="name" placeholder="Enter Course Name">
    </li>
    <li>
      <label>Description</label>
      <textarea name="description" placeholder="Enter Description"></textarea>
    </li>
    <li>
      <button type="submit" name="submit">Add Course</button>
    </li>
  </ul>
</form>