<?php
require "header.php";
?>

<form action="/index.php?page=update_director" method="post">
    <div class="form-group">
        <input type="hidden" name="id" class="form-control" id="id" value="" readonly>
    </div>
    <div class="form-group">
        <label for="name">Name: </label>
        <input type="text" name="name" class="form-control" id="name" value="" required>
    </div>
    <div class="form-group">
        <label for="birth_year">Birth-year: </label>
        <input type="text" name="birth_year" class="form-control" id="birth_year" value="" required>
    </div>
    <button type="submit" class="btn btn-default" name="insert" id="insert">Update director</button>
</form>

<?php
require "footer.php";
?>
