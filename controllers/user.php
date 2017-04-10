<?php


	/**
	* 
	*/
	class User extends Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			Auth::check();

		}

		//Form::post('data', array('id' => 1));

		public function index() {
			$this->view->title = 'Korisnici';
			$this->view->userList = $this->model->userList();
			$this->view->render('user/index');
		}

		public function create() {
			$data = array();
			$data['login']    = $_POST['login'];
			$data['password'] = $_POST['password'];
			$data['role']     = $_POST['role'];

			//TOOODOOOO

			$this->model->create($data);
			Redirect::to(''.URL.'user');
		}

		public function edit($id) {
			$this->view->title = 'Uredi Korisnika';
			$this->view->user = $this->model->usersSingleList($id);
			$this->view->render('user/edit');
		}

		public function editSave($id) {
			$data = array();
			$data['userid']       = $id;
			$data['login']    = $_POST['login'];
			$data['password'] = $_POST['password'];
			$data['role']     = $_POST['role'];

			//TOOODOOOO

			$this->model->editSave($data);
			header('location: '. URL .'user');
		}

		public function delete($id) {
			$this->model->delete($id);
			Redirect::to(''.URL.'user');
		}

	}