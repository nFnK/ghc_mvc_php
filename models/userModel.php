<?php


	/**
	* 
	*/
	class userModel extends Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function userList() {
			return $this->db->select('SELECT userid, login, role FROM user');
		}

		public function usersSingleList($userid) {
			return $this->db->select('SELECT userid, login, role FROM user WHERE userid = :userid', array(':userid' => $userid));
		}

		public function create($data) {
			$this->db->insert('user', array(
							  'login' 	 => $data['login'],
							  'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY), 
							  'role'	 => $data['role']));
		}	

		public function delete($userid){
			$result = $this->db->select('SELECT role FROM user WHERE userid = :userid', array(':userid' => $userid));
		
			if ($result[0]['role'] == 'owner')
			return false;

			// $sth = $this->db->prepare('DELETE FROM user WHERE id = :id');
			// $sth->execute(array(':id' => $id));
			$this->db->delete('user', "userid = '$userid'");
		}

		public function editSave($data) {
			$postData = array(
			'login' => $data['login'],
			'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
			'role' => $data['role']
		);
		
		$this->db->update('user', $postData, "`userid` = {$data['userid']}");
		}

	}