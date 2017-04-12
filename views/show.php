<?php
include "header.php";
?>
<h2>Filmer</h2>
<table class="table-striped">
	<tr>
		<th>Title</th>
		<th>Alternative title</th>
		<th>Director</th>
		<th>Country</th>
		<th>Year</th>
	</tr>
	<?php 
	foreach ($movies as $row):
	?>
	<tr>
		<td><?php echo $row->getTitle(); ?></td>
		<td><?php echo $row->getAltTitle(); ?></td>
		<td><?php echo $row->getDirector(); ?></td>
		<td><?php echo $row->getCountry(); ?></td>
		<td><?php echo $row->getYear(); ?></td>
		<td><button class="btn btn-default" name="btn-edit" id="edit"><a href="views/update.php?edit_id=<?php echo $row->getId(); ?>">Uppdatera</a></button></td>
		<td><button class="btn btn-default"><a href="views/show.php?del_id=<?php echo $row->getId(); ?>">Ta bort</a></button></td>
	</tr>
	<?php endforeach ?>
	<tr>
	<th colspan="8" align="right">
		<button class="btn btn-default" name="btn-create" id="create"><a href="views/create.php">Lägg till</a></button>
	</th>
	</tr>


</table>


<?php
//include "footer.php";
?>