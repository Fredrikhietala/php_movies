<?php
/* @var Controller $this */
require "header.php";
?>

<form action="/index.php?page=create_movie" method="post">
    <div class="form-group">
        <label for="director_id">Director: </label>
        <select class="form-control" id="director_id" name="director_id">
            <?php
            foreach ($this->db->readAll('director') as $value) :
                /* @var Director $value */
            ?>
            <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
		<label for="title">Title: </label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title" required>
	</div>
	<div class="form-group">
		<label for="alt_title">Alternative title: </label>
		<input type="text" name="alt_title" class="form-control" id="alt_title" placeholder="Alternative title">
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