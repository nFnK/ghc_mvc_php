<?php

	/**
	* 
	*/
	class Controller
	{
		
		function __construct()
		{
			//echo 'Main Controller <br>';
			$this->view = new View();
		}

		public function loadModel($name, $modelPath = 'models/') {
			
			$path = $modelPath . $name.'Model.php';

			if(file_exists($path)){
				require $modelPath . $name.'Model.php';
				$modelName = $name.'Model';
				$this->model = new $modelName();
			}
		}

	}