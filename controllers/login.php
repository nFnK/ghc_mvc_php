<?php


	/**
	* 
	*/
	class Login extends Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function index() {
			$this->view->title = 'Prijavi Se';
			$this->view->render('login/index');
		}

		function run(){
			Session::flash('home', 'Nijeste uspjesli da se prijavite.');
			$this->model->run();
		} 


	}