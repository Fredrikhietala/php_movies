<?php
include "header.php";
require "../model/productsModel.php";

$obj = new Crud;
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
	foreach ($obj->showAll("films") as $value) {
		extract($value);
	?>
	<tr>
		<td><?php echo $title ?></td>
		<td><?php echo $swedishTitle ?></td>
		<td><?php echo $director ?></td>
		<td><?php echo $country ?></td>
		<td><?php echo $year ?></td>
	</tr>
	<?php
	}
	?>



</table>


<?php
include "footer.php";
?>