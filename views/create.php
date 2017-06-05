<?php
/* @var Controller $this */
require "header.php";
?>

<form id="create_movie" action="/index.php?page=create" method="post">
    <div class="form-group">
        <label for="directorId">Director: </label>
        <select class="form-control" id="directorId" name="directorId">
            <option value="">Choose Director</option>
            <?php
            foreach ($this->readAllDirectors() as $rows) :
                /* @var Director $rows */
            ?>
            <option value="<?php echo $rows->getName() ?>"><?php echo $rows->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
		<label for="title">Title: </label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
	</div>
	<div class="form-group">
		<label for="altTitle">Alternative title: </label>
		<input type="text" name="alt_title" class="form-control" id="altTitle" placeholder="Alternative title">
	</div>
	<div class="form-group">
		<label for="year">Year: </label>
		<input type="text" name="year" class="form-control" id="year" placeholder="Year">
	</div>
    <p style="display: none;" id="error_message">Du måste fylla i alla formulärfält</p>
	<button type="submit" class="btn btn-default" name="insert" id="insert">Insert new movie</button>
</form>

<?php
require "footer.php";
?>