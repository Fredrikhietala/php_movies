<?php
require "header.php";
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
	foreach ($movie as $row):
	?>
	<tr>
		<td><?php echo $row->getTitle(); ?></td>
		<td><?php echo $row->getAltTitle(); ?></td>
		<td><?php echo $row->getDirector(); ?></td>
		<td><?php echo $row->getCountry(); ?></td>
		<td><?php echo $row->getYear(); ?></td>
		<td><button class="btn btn-default" name="btn-edit" id="edit"><a href="../views/update.php?edit_id=<?php echo $row->getId(); ?>">Update</a></button></td>
		<td>
            <form action="../index.php" method="post">
                <input type="hidden" name="delete" value="<?php echo $row->getId(); ?>"/>
                <button type="submit" class="btn btn-default" name="btn-delete">Delete</button>
            </form>
        </td>
	</tr>
	<?php endforeach ?>
	<tr>
	<th colspan="8" align="right">
        <button class="btn btn-default" name="btn-create" id="create"><a href="../views/create.php">Create</a></button>
	</th>
	</tr>


</table>


<?php
require "footer.php";
?>