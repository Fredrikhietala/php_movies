<?php
/* @var Movie $movie */
/* @var Controller $this */
require "header.php";
?>

<form action="/index.php?page=do_update_movie" method="post">
	<div class="form-group">
        <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $movie['id']; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="director_id">Director: </label>
        <select class="form-control" name="director_id" id="director_id">
            <?php
            foreach ($this->db->readAll('director') as $value) :
            ?>
            <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
		<label for="title">Title: </label>
		<input type="text" name="title" class="form-control" id="title" value="<?php echo $movie['title']; ?>" required>
	</div>
	<div class="form-group">
		<label for="alt_title">Alternative title: </label>
		<input type="text" name="alt_title" class="form-control" id="alt_title" value="<?php echo $movie['alt_title']; ?>">
	</div>
	<div class="form-group">
		<label for="year">Year: </label>
		<input type="text" name="year" class="form-control" id="year" value="<?php echo $movie['year']; ?>" required>
	</div>
	<button type="submit" class="btn btn-default" name="update_movie">Update movie</button>
</form>

<?php
require "footer.php";
?>