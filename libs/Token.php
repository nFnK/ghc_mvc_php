<?php

	/**
	* 
	*/
	class Token
	{
		public static function generate() {
			return Session::set('token_name', md5(uniqid()));
		}
	}