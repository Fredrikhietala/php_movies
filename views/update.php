<?php
/* @var Movie $movie */
/* @var Controller $this */
require "header.php";
?>

<form action="/index.php?page=update" method="post">
	<div class="form-group">
        <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $movie->getId(); ?>" readonly>
    </div>
    <div class="form-group">
        <label for="directorId">Director: </label>
        <select class="form-control" name="directorId" id="directorId">
            <option value="">Choose Director</option>
            <?php
            foreach ($this->readAllDirectors() as $rows) :
                /* @var Director $rows */
            ?>
            <option value="<?php echo $rows->getName(); ?>"><?php echo $rows->getName(); ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="director_id" class="form-control" id="directorId" value="<?php echo $movie->getDirectorId(); ?>" required>
    </div>
    <div class="form-group">
		<label for="title">Title: </label>
		<input type="text" name="title" class="form-control" id="title" value="<?php echo $movie->getTitle(); ?>" required>
	</div>
	<div class="form-group">
		<label for="altTitle">Alternative title: </label>
		<input type="text" name="alt_title" class="form-control" id="altTitle" value="<?php echo $movie->getAltTitle(); ?>">
	</div>
	<div class="form-group">
		<label for="year">Year: </label>
		<input type="text" name="year" class="form-control" id="year" value="<?php echo $movie->getYear(); ?>" required>
	</div>
	<button type="submit" class="btn btn-default" name="btn-update">Update</button>
</form>

<?php
require "footer.php";
?>