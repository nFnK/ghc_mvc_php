<?php

	/**
	* 
	* - Polja za ispis
	* - Validate
	* - Sanitiza
	* - Post
	* - Return Data
	* - Pisanje u bazi podataka
	*
	*/
	require 'Form/Validator.php';
	class Form
	{
		/** @var array $_correntItem nadlezan za poslate stavke */
		private $_currentItem = null;
		
		/** @var array $_postData mjesto za post podatke */
		private $_postData = array();
		
		/** @var objekat $_validator Validator objekat */
		private $_validator = array();

		/** @var array $_error pokazi na gresku */
		private $_error = array();

		/**
		* Konstruktor
		* Instanciranje validator objekta
		*/
		function __construct()
		{
			$this->_validator = new Validator();
		}

		/**
		* @param string - $field Html polje za post 
		*/
		public function post($field) {
			$this->_postData[$field] = $_POST[$field];
			$this->_currentItem = $field;
			return $this;
		
		}

		/**
		* Get/Uzmi poslate podatke 
		* @param mixed $fieldName
		*
		* @return mixed vrace string jedan ili kao niz array	
		*/
		public function get($fieldName = false) {
			if ($fieldName) {
				if (isset($this->_postData[$fieldName])) 
				return $this->_postData[$fieldName];
				else
				return false;
			} else {
			return $this->_postData;
		}
		}

		/**
		* 
		*/
		public function validator($Validator, $arg = null) {

			if ($arg == null) {
				$error = $this->_validator->{$Validator}($this->_postData[$this->_currentItem]);
			} else {
				$error = $this->_validator->{$Validator}($this->_postData[$this->_currentItem], $arg);
			}
			
			if($error) {
				$this->_error[$this->_currentItem] = $error;
			} 

			return $this;
		}

		public function submit(){
			if(empty($this->_error)){
				return true;
			} else {
				$str = '';
				foreach ($this->_error as $key => $value) {
					$str .= $key . ' => ' . $value . "\n";
					//$e = implode(', ', $this->_error);
				}
				throw new Exception($str);
				//return $str;
			}
		}
	}