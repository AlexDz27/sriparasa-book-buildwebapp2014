<div id="getStudent">
  <div id="importStudents">
    <p>
      <button id="openImportStudentsFrmButton" type="button">Open Import Students Form</button>
    </p>
    <div id="importStudentsFrm" style="display: none;">
      <form action="/students/import" method="post" enctype="multipart/form-data">
        <label for="file"></label>
        <input type="file" name="file">
        <button type="submit" name="submit">Import Students</button>
      </form>
    </div>
  </div>

  <div id="message">
    <?php if (isset($this->message)): ?>
      <?= $this->message ?>
    <?php endif; ?>
  </div>

  <table>
    <tr>
      <th>Student Id</th>
      <th>First Name</th>
      <th>Last Name</th>
    </tr>

    <?php foreach ($this->studentData as $student): ?>
      <tr>
        <td><?= $student['student_id'] ?></td>
        <td><?= $student['first_name'] ?></td>
        <td><?= $student['last_name'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <a id="exportStudentsLink" href="/students/export">Export Students</a>
</div>

<script>
  const importForm = document.getElementById('importStudentsFrm')
  const importButton = document.getElementById('openImportStudentsFrmButton');
  importButton.addEventListener('click', () => importForm.style.display = 'block');
</script>