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
            <a class="btn btn-default" href="/index.php?page=update&id=<?php echo $row->getId(); ?>">Update</a>
        </td>
		<td>
            <a class="btn btn-default" href="/index.php?page=show&id=<?php echo $row->getId(); ?>">Delete</a>
        </td>
	</tr>
	<?php endforeach ?>
</table>


<?php
require "footer.php";
?>