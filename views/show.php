<?php
/* @var Controller $this */
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
        <th>Actions</th>
	</tr>
	<?php 
	foreach ($this->readAllMovies() as $row):
        /* @var Movie $row */
	?>
	<tr>
		<td><?php echo $row->getTitle(); ?></td>
		<td><?php echo $row->getAltTitle(); ?></td>
		<td><?php echo $row->getDirector(); ?></td>
		<td><?php echo $row->getCountry(); ?></td>
		<td><?php echo $row->getYear(); ?></td>
		<td>
            <form action="../index.php?page=update" method="post">
                <input type="hidden" name="edit" value="<?php echo $row->getId(); ?>"/>
                <button class="btn btn-default" name="btn-edit" id="edit">Update</button>
            </form>
        </td>
		<td>
            <form action="../index.php?page=show" method="post">
                <input type="hidden" name="delete" value="<?php echo $row->getId(); ?>"/>
                <button type="submit" class="btn btn-default" name="btn-delete">Delete</button>
            </form>
        </td>
	</tr>
	<?php endforeach ?>
</table>


<?php
require "footer.php";
?>