<?php

	class Auth {

		public static function check() {
			@session_start();
			$logged = $_SESSION['loggedIn'];
			if ($logged == false) {
				session_destroy();
				header('location: ../login');
				exit;
			}
		}

	}