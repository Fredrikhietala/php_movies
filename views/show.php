<?php
/* @var Controller $this */
require "header.php";
?>
<h2>Filmer</h2>
<table class="table-striped">
	<tr>
		<th>Name</th>
		<th>Birth-year</th>
        <th>Actions</th>
        <th></th>
	</tr>
	<?php 
	foreach ($this->readAllDirectors() as $directors):
        /* @var Director $directors */
	?>
        <tr>
            <td><?php echo $directors->getName(); ?></td>
            <td><?php echo $directors->getBirthYear(); ?></td>
            <td>
                <a class="btn btn-default" href="/index.php?page=update_director&id=<?php echo $directors->getId(); ?>">Update</a>
            </td>
            <td>
                <a class="btn btn-default" href="/index.php?page=show&id=<?php echo $directors->getId(); ?>">Delete</a>
            </td>
        </tr>
        <tr>
            <td>Title</td>
            <td>Alternative Title</td>
            <td>Country</td>
            <td>Year</td>
        </tr>
        <?php
        /* @var Movie $directorId */
        foreach ($this->readMovies($directorId) as $movies):
            /* @var Movie $movies */
        ?>
            <tr>
                <td><?php echo $movies->getTitle(); ?></td>
                <td><?php echo $movies->getAltTitle(); ?></td>
                <td><?php echo $movies->getCountry(); ?></td>
                <td><?php echo $movies->getYear(); ?></td>
            </tr>
        <?php endforeach ?>
	<?php endforeach ?>

</table>


<?php
require "footer.php";
?>