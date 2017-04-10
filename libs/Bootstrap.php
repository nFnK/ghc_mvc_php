<?php



class Bootstrap {

	private $_url = null;
	private $_controller = null;


	private $_controllerPath = 'controllers/';
	private $_modelPath = 'models/';
    private $_errorFile = 'error.php';
    private $_defaultFile = 'index.php';

	/**
	* Konstruktor za pocetak Bootstrap
	* @return boolean|string
	*/
	public function init() {
		//protected na $_url
		$this->_getUrl();
		
		//ucitavanje default kontroloera ako nije url setovan
		if (empty($this->_url[0])) {
			$this->_loadDefaultController();
			
			return false;
		}

		$this->_loadExistingController();
		$this->_callControllerMethod();	
	}

	/**
	 * (opciono) postaviti putanju do klasa/kontrolelra
	 * @param string $path
	 */
	public function setControllerPath($path) {
		$this->_controllerPath = trim($path, '/'). '/';
	}


	/**
	 * (opciono) postaviti putanju do modela/funkcije
	 * @param string $path
	 */
	public function setModelPath($path) {
		$this->_modelPath = trim($path, '/'). '/';
	}


	/**
	 * (opciono) postaviti putanju do error fajla
	 * @param string $path koristi se samo za fajl koji se nalazi u controllers folderu npr: error.php
	 */
    public function setErrorFile($path)
    {
        $this->_errorFile = trim($path, '/');
    }
	/**
	 * (opciono) postaviti putanju do index fajla
	 * @param string $path koristi se samo za fajl koji se nalazi u controllers folderu npr: index.php
	 */
    public function setDefaultFile($path)
    {
        $this->_defaultFile = trim($path, '/');
    }

	// mvc/kontroler/metoda/{param}
	// url[0] = kontroler
	// url[1] = metoda
	// url[2] = kraj/param
	/**
	 * URL adresa clasa->funkcija i na kraju id
	 * @return string
	 */
	private function _callControllerMethod() {


		$length = count($this->_url);
		//provjerava da li pozvana metoda u kontroler postoji
		if ($length > 1) {
			if (!method_exists($this->_controller, $this->_url[1])) {
				$this->_error();
			}
		}

		//sta ce se ucitati
		switch ($length) {
			case '5':
				//kontroler->metda(param1, param2, param3)
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
				break;
			case '4':
				//kontroler->metda(param1, param2)
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
				break;
			case '3':
				//kontroler->metda(param1)
				$this->_controller->{$this->_url[1]}($this->_url[2]);
				break;
			case '2':
				//kontroler->metda()
				$this->_controller->{$this->_url[1]}();
				break;
			default:
			
			print_r($this->_url);
			die('Provjerite vas Bootstrap fajl, nesto nije u redu sa parametrima.');	
			break;
			
			//$this->_controller->index();
		}
	}

	/**
	 * FUnkcija ucitava kontrolerE ako je GET parametar postavljen 
	 *
	 * @return boolean|string
	 */
	private function _loadExistingController() {
		$file = $this->_controllerPath . $this->_url[0] . '.php';
		if (file_exists($file)) {
			require $file;
			$this->_controller = new $this->_url[0];
			$this->_controller->loadModel($this->_url[0], $this->_modelPath);
		} else {
			$this->_error();
			return false;
		}

	}

	/**
	 * Funkcija ce se ucitati samo ako URL paramtar ne postoji
	 */
	private function _loadDefaultController() {
			require $this->_controllerPath. $this->_defaultFile;
			$this->_controller = new Index();
			$this->_controller->index();
	}

	/**
	 * Uzima $_GET iz URL-a 
	 */
	private function _getUrl() {
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$this->_url = explode('/', $url);
	}
	
	function _error() {
		require $this->_controllerPath . $this->_errorFile;
		$controller = new Error();
		$controller->index();
		exit;
	}

}