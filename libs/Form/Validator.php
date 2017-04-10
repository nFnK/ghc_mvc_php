<?php

	/**
	* 
	*/
	class Validator
	{
		function __construct()
		{
			
		}

		public function minlength($data, $arg) {
			if(strlen($data) < $arg){
				return 'Vas string mora biti duzi od ' . $arg . ' karaktera';
			} 
		}

		public function maxlength($data, $arg) {
			if(strlen($data) > $arg){
				return 'Vas string moze biti najduzi ' . $arg . ' karaktera';
			}
		}

		public function integer($data) {
			if(ctype_digit($data) == false){
				return 'Vas string mora biti integer.';
			}
		}

		public function __call($name, $arguments) {
			throw new Exception(" $name ne postoji u ". __CLASS__);
		}

	}