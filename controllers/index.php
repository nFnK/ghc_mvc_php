<?php

	/**
	* 
	*/
	class Index extends Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function index() 
		{
			$this->view->title = 'Naslovna';
			$this->view->render('index/index');
		}

	}