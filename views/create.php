<?php
/* @var Model $model */
require "header.php";
?>

<form action="/index.php?page=create_movie" method="post">
    <div class="form-group">
        <label for="directorId">Director: </label>
        <select class="form-control" id="directorId" name="directorId">
            <?php
            foreach ($this->model->readAll() as $rows) :
                /* @var Director $rows */
            ?>
            <option value="<?php echo $rows->getId(); ?>"><?php echo $rows->getName(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
		<label for="title">Title: </label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title" required>
	</div>
	<div class="form-group">
		<label for="altTitle">Alternative title: </label>
		<input type="text" name="altTitle" class="form-control" id="altTitle" placeholder="Alternative title">
	</div>
	<div class="form-group">
		<label for="year">Year: </label>
		<input type="text" name="year" class="form-control" id="year" placeholder="Year" required>
	</div>
	<button type="submit" class="btn btn-default" name="insert_movie" id="insert_movie">Insert new movie</button>
</form>

<?php
require "footer.php";
?>