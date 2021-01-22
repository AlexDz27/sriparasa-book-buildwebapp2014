<h1>Login</h1>

<?= "Username of the current user: {$this->username}<br>" ?>
<?= "Message: {$this->message}<br>" ?>

<form class="Frm" action="login" method="post">
  <ul>
    <li>
      <label>Username</label>
      <input name="username" placeholder="Enter Username">
    </li>
    <li>
      <label>Password</label>
      <input name="password" type="password" placeholder="Enter Password">
    </li>
    <li>
      <button type="submit" name="submit">Login</button>
    </li>
  </ul>
</form>

<?php if (Session::get('logged_in')): ?>
  <p class="log">
    <?= Session::get('username') . ' | '  ?> <a href="<?= BASE_URL . '/login/logout' ?>">Logout</a>
  </p>
<?php endif; ?>
