<?php


	/**
	* 
	*/
	class Note extends Controller
	{
		
		function __construct()
		{
			parent::__construct();
			Auth::check();
			//print_r(Flash::flash());
		}

		public function index() {
			$this->view->title = 'Biljeske';
			$this->view->noteList = $this->model->noteList();
			$this->view->render('note/index');
			// $flash = new Flash();
			//Session::flash('home', 'Upsjesno ste dodali biljesku');
		}

		public function create() {
			try { 
				$form = new Form();
				$form->post('title')->validator('minlength', 2)->post('content')->validator('maxlength', 500);

				$data = $form->get();
				$form->submit();

				$this->model->create($data);
				Session::flash('home', 'Upsjesno ste dodali biljesku');
				Redirect::to(''.URL.'note');
			} catch(Exception $e) {
				//echo $e->getMessage();
				Session::flash('home', $e->getMessage());
				Redirect::to(''.URL.'note');
			}
		}

		public function edit($id) 
		{
			$this->view->title = 'Uredi Biljesku';
			$this->view->note = $this->model->noteSingleList($id);
		
			if (empty($this->view->note)) {
				die('Ova beljeska ne postoji!');
			}
			
			$this->view->render('note/edit');
		}
		
		public function editSave($noteid)
		{
			$data = array(
				'noteid' => $noteid,
				'title' => $_POST['title'],
				'content' => $_POST['content']
			);
		
		// @todo
		
			$this->model->editSave($data);
			header('location: ' . URL . 'note');
		}

		public function delete($id)
		{
			$this->model->delete($id);
			Redirect::to(''.URL.'note');
			//header('location: ' . URL . 'note');
		}

	}