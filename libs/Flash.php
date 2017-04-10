<?php

	/**
	* 
	*/
	class Flash
	{
		public static function exists($ime) {
			return (isset($_SESSION[$ime])) ? true : false;
		}
		public static function put($ime, $value) {
			return $_SESSION[$ime] = $value;
		}

		public static function get($ime) {
			return $_SESSION[$ime];

		}

		public static function delete($ime) {
			if(self::exists($ime)) {
				unset($_SESSION[$ime]);
			}
		}

		public static function flash($ime, $string = ''){
			if(self::exists($ime)) {
				$session = self::get($ime);
				self::delete($ime);
				return $session;
			} else {
				//self::put($ime, $string);
			}
		}

	}