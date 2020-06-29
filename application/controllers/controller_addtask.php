<?php

class Controller_AddTask extends Controller
{

	function __construct()
	{
    $this->model = new Model_AddTask();
    $this->view = new View();
	}

	function action_index()
	{
		$this->view->generate('addtask_view.php', 'template_view.php');
	}

  function action_inserttask()
	{
		$data = $this->model->insert_data();
    $this->view->generate('addtask_view.php', 'template_view.php',$data);
	}

	function action_edittask()
	{
		session_start();
		if(isset($_SESSION['uid'])){
			$data = $this->model->get_dataById();
			$this->view->generate('edittask_view.php', 'template_view_login.php',$data);
		}else{
			$this->view->generate('404_view.php', 'template_view.php',$data);
		}
	}

	function action_savetask()
	{
		session_start();
		if(isset($_SESSION['uid'])){
			$data = $this->model->save_data();
	    $this->view->generate('edittask_view.php', 'template_view_login.php',$data);
		}else{
			$this->view->generate('404_view.php', 'template_view.php',$data);
		}
	}

}
