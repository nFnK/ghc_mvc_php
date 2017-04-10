<?php

require '../config.php';
require '../libs/Form.php';
require '../libs/Database.php';

if (isset($_REQUEST['run'])) {
	try {
		
		$form = new Form();

		$form	->post('name')
				->validator('minlength', 2)

				->post('age')
				->validator('minlength', 2)
				->validator('integer')

				->post('gender');
		
		$form	->submit();
		
		echo 'The form passed!';
		$data = $form->get();
		
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		
		$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
		$db->insert('osobe', $data);
		
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}
?>

<form method="post" action="?run">
	Name <input type="text" name="name" />
	Age <input type="text" name="age" />
	Gender <select name="gender">
		<option value="m">Male</option>
		<option value="f">Female</option>
	</select>
	<input type="submit" />
</form>