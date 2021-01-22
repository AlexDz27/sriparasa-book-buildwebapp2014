<?php

class Login extends BaseController {
  public function __construct() {
    parent::__construct();

    $this->loadModel('Login');
  }

  public function index() {
    $username = Session::get('username');

    $this->view->username = $username ?? '';
    $this->view->message = $_GET['message'] ?? '';

    $this->view->render('login/index');
  }

  public function login() {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = isset($_POST['isAdmin']) ? 'admin' : 'student';

    $this->model->login($username, $password, $type);
  }

  public function logout() {
    Session::destroy();

    header('Location: ' . BASE_URL . '/login/index.php?message=' . urlencode('logout success'));
  }
}