<?php

class Controller_Main extends Controller
{

	function __construct()
	{
		$this->model = new Model_Tasks();
		$this->view = new View();
	}

	function action_index()
	{
		$data = $this->model->get_data();
		session_start();
		if(isset($_SESSION['uid'])){
				$this->view->generate('main_view_login.php', 'template_view_login.php',$data);
		}else{
				$this->view->generate('main_view.php', 'template_view.php',$data);
		}
	}
}
