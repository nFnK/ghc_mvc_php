<?php
  if(Session::exists('home')) {
    echo '<p>' .Session::flash('home'). '</p>';
  }
?>
<h1>Prijava</h1>
<form action="login/run" method="post">
	<label>Korisnicko ime</label><input type="text" name="login" /><br />
	<label>Lozinka</label><input type="password" name="password" /><br />
	<label></label><input type="submit" />
</form>