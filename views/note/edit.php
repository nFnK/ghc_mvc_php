
<h1>Biljeske: Uredi</h1>
<form method="post" action="<?php echo URL; ?>note/editSave/<?php echo $this->note[0]['noteid'] ?>">
	<label>Korisnicko Ime</label><input name="title" type="text" value="<?php echo $this->note[0]['title'] ?>" /><br>
	<label>Sadrzaj</label><textarea name="content" type="text"><?php echo $this->note[0]['content'] ?> </textarea> <br>
	<label>&nbsp;</label><input type="submit" />
</form>