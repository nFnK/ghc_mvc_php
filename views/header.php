<html>
<head>
	<meta charset="UTF-8">
	<title>MVC <?=(isset($this->title)) ? $this->title : 'MVC'; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/default.css">
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/sunny/jquery-ui.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>js/custom.js"></script>
	<?php
	if(isset($this->js)) {
		foreach ($this->js as $js) {
		echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
	}
}
	?>
</head>
<body>
	<?php Session::init(); ?>
<div id="header">
	<?php if (Session::get('loggedIn') == false):?>
	<a href="<?php echo URL; ?>index">Naslovna</a>
	<a href="<?php echo URL; ?>help">Pomoc</a>
	<?php endif; ?>
	<?php if (Session::get('loggedIn') == true):?>
	<a href="<?php echo URL; ?>dashboard">Admin</a>	
	<a href="<?php echo URL; ?>note">Beljeske</a>
	<?php if (Session::get('role') == 'owner'):?>
	<a href="<?php echo URL; ?>user">Korisnici</a>	
		<?php endif; ?>
		<a href="<?php echo URL; ?>dashboard/logout">Odjavi se</a>	
	<?php else: ?>
		<a href="<?php echo URL; ?>login">Prijavi se</a>
	<?php endif; ?>
</div>
<div id="content">