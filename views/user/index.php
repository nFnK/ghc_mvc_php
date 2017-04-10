<h1>Korisnici</h1>


<form method="post" action="<?php echo URL; ?>user/create">
	<label>Korisnicko Ime</label><input name="login" type="text" /><br>
	<label>Lozinka</label><input name="password" type="text" /><br>
	<label>Uloga</label>
	<select name="role">
		<option></option>
		<option value="default">Korisnik</option>
		<option value="admin">Admin</option>
		<option value="owner">Osnivac</option>
	</select><br>
	<label>&nbsp;</label><input type="submit">
</form>
<hr>
<table>
	<tr>
<?php 
	foreach ($this->userList as $key => $value) {
		echo '<tr>';
		echo '<td>' . $value['userid'] . '</td>';
		echo '<td>' . $value['login'] . '</td>';
		echo '<td>' . $value['role'] . '</td>';
		echo '<td><a href="'. URL .'user/edit/'.$value['userid'].'">Uredi</a> 
				  <a href="'. URL .'user/delete/'.$value['userid'].'">Izbrisi</a>
			  </td>';
		echo '</tr>';
	}
	//print_r($this->userList);

?>
</tr>
</table>