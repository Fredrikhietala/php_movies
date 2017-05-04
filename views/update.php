<?php
/* @var Controller $this */
require "header.php";
$id = $_POST['edit'];
foreach ($this->getById($id) as $row) :
/* @var Movie $row */
?>

<form action="../index.php?page=update" method="post">
	<div class="form-group">
        <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $row->getId(); ?>" readonly>
    </div>
    <div class="form-group">
		<label for="title">Title: </label>
		<input type="text" name="title" class="form-control" id="title" value="<?php echo $row->getTitle(); ?>" required>
	</div>
	<div class="form-group">
		<label for="altTitle">Alternative title: </label>
		<input type="text" name="altTitle" class="form-control" id="altTitle" value="<?php echo $row->getAltTitle(); ?>">
	</div>
	<div class="form-group">
		<label for="director">Director: </label>
		<input type="text" name="director" class="form-control" id="director" value="<?php echo $row->getDirector(); ?>" required>
	</div>
	<div class="form-group">
		<label for="country">Country: </label>
		<input type="text" name="country" class="form-control" id="country" value="<?php echo $row->getCountry(); ?>" required>
	</div>
	<div class="form-group">
		<label for="year">Year: </label>
		<input type="text" name="year" class="form-control" id="year" value="<?php echo $row->getYear(); ?>" required>
	</div>
	<button type="submit" class="btn btn-default" name="btn-update">Update</button>
</form>

<?php
endforeach;
require "footer.php";
?>