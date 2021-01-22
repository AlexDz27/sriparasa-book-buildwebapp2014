<?php

class Login extends BaseController {
  public function __construct() {
    parent::__construct();

    Session::init();
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

    $this->model->login($username, $password);
  }

  public function logout() {
    Session::destroy();

    header('Location: ' . BASE_URL . '/login/index.php?message=' . urlencode('logout success'));
  }
}