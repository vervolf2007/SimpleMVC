<?php

class Controller_Login extends Controller
{

	function __construct()
	{
    $this->model = new Model_Login();
    $this->view = new View();
	}

	function action_index()
	{
		$this->view->generate('login_view.php', 'template_view.php','');
	}

  function action_login()
	{
		$data = $this->model->log_in();
    if(empty($data)){
        $this->view->generate('login_view.php', 'template_view.php','Не верное имя пользователя или пароль!');
    }else{
      session_start();
      foreach ($data as $value) {
        $_SESSION['uid'] = md5($value['name']);
        $_SESSION['user_name'] = $value['name'];
        $this->view->generate('login_view.php', 'template_view_login.php','Вход выполнен!');
      }
    }
	}

  function action_exit() {
    session_start();
    session_destroy();
    $this->view->generate('login_view.php', 'template_view.php','ВЫ ВЫШЛИ!');
  }
}
