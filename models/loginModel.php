<?php

class loginModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function run()
	{
		$sth = $this->db->prepare("SELECT userid, role FROM user WHERE 
				login = :login AND password = :password");
		$sth->execute(array(
			':login' => $_POST['login'],
			':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
		));

		$data = $sth->fetch();

		$count =  $sth->rowCount();
		if ($count > 0) {
			// login
			Session::init();
			Session::set('role', $data['role']);
			Session::set('userid', $data['userid']);
			Session::set('loggedIn', true);
			Redirect::to(''.URL.'dashboard');
		} else {
			Session::flash('home', 'Nijeste uspjesli da se prijavite.');
			Redirect::to(''.URL.'login');
		}
		
	}
	
}