<h1>Korisnici: Uredi</h1>
<?php
	print_r($this->user);
?>
<form method="post" action="<?php echo URL; ?>user/editSave/<?php echo $this->user[0]['userid'] ?>">
	<label>Korisnicko Ime</label><input name="login" type="text" value="<?php echo $this->user[0]['login'] ?>" /><br>
	<label>Lozinka</label><input name="password" type="text" placeholder="nova lozinka" /><br>
	<label>Uloga</label>
	<select name="role">
		<option value="default" <?php if($this->user[0]['role'] == 'default') echo 'selected'; ?>>Korisnik</option>
		<option value="admin" <?php if($this->user[0]['role'] == 'admin') echo 'selected'; ?>>Admin</option>
		<option value="owner" <?php if($this->user[0]['role'] == 'owner') echo 'selected'; ?>>Osnivac</option>
	</select><br>
	<label>&nbsp;</label><input type="submit">
</form>