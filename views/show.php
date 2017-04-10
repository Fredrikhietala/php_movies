<?php
//include "header.php";
?>
<h2>Filmer</h2>
<table>
	<tr>
		<th>Titel</th>
		<th>Svensk titel</th>
		<th>Regissör</th>
		<th>Land</th>
		<th>År</th>
	</tr>
	<?php 
	foreach ($movielist as $row) {
	?>
	<tr>
		<td><?php echo $movies->title; ?></td>
		<td><?php echo $movies->altTitle; ?></td>
		<td><?php echo $movies->director; ?></td>
		<td><?php echo $movies->country; ?></td>
		<td><?php echo $movies->year; ?></td>
		<td><button class="btn btn-default"><a href="update.php?id=<?php echo $row['id']; ?>">Uppdatera</a></button></td>
		<td><button class="btn btn-default"><a href="delete.php?id=<?php echo $row['id']; ?>">Ta bort</a></button></td>
	</tr>
	<?php 
	} ?>



</table>


<?php
//include "footer.php";
?>