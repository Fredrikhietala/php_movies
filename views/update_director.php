<?php
/* @var Director $director */
require "header.php";
?>

<form action="/index.php?page=do_update_director" method="post">
    <div class="form-group">
        <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $director['id']; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="name">Name: </label>
        <input type="text" name="name" class="form-control" id="name" value="<?php echo $director['name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="birth_year">Birth-year: </label>
        <input type="text" name="birth_year" class="form-control" id="birth_year" value="<?php echo $director['birth_year']; ?>" required>
    </div>
    <div class="form-group">
        <label for="nationality">Nationality: </label>
        <input type="text" name="nationality" class="form-control" id="nationality" value="<?php echo $director['nationality']; ?>" required>
    </div>
    <button type="submit" class="btn btn-default" name="update_director" id="update_director">Update director</button>
</form>

<?php
require "footer.php";
?>
