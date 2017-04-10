<h1>Biljeske</h1>
<?php
  if(Session::exists('home')) {
    echo '<p>' .Session::flash('home'). '</p>';
  }
?>
<form method="post" action="<?php echo URL;?>note/create">
	<label>Naslov</label><input type="text" name="title" /><br />
	<label>Sadrzaj</label><textarea name="content"></textarea><br />
	<label>&nbsp;</label><input type="submit" />
</form>

<hr />

<table>
<?php
	foreach($this->noteList as $key => $value) {
		echo '<tr>';
		echo '<td>' . $value['title'] . '</td>';
		echo '<td>' . $value['created_at'] . '</td>';
		echo '<td><a href="'. URL . 'note/edit/' . $value['noteid'].'">Uradi</a></td>';
		echo '<td><a class="delete" href="'. URL . 'note/delete/' . $value['noteid'].'">Izbrisi</a></td>';
		echo '</tr>';
	}
?>
</table>

<script>
$(function() {
	
	$('.delete').click(function(e) {
		var c = confirm("Jeste li sigurni da zelite izbrisati ovu beljesku?");
		if (c == false) return false;
		
	});
	
});
</script>
