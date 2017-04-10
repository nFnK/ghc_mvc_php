<?php

	/**
	* 
	*/
	class Error extends Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function index() {
			$this->view->title = '404 Error Stranica';
			$this->view->msg = 'Ova stranica ne postoji.';
			$this->view->render('error/index');
		}


	}