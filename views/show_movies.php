<?php
/* @var Model $model */
/* @var Director $director */
require "header.php";
?>
<div class="row">
    <div class="col-lg-6 col-sm-12">
    <h2>Movies by director</h2>
    <table class="table-striped">
        <tr>
            <th>Title</th>
            <th>Alternative Title</th>
            <th>Year</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        /* @var Model $id */
        foreach ($this->model->readMovies($id) as $movies):
            /* @var Movie $movies */
            ?>
            <tr>
                <td><?php echo $movies->getTitle(); ?></td>
                <td><?php echo $movies->getAltTitle(); ?></td>
                <td><?php echo $movies->getYear(); ?></td>
                <td>
                    <a class="btn btn-default" href="/index.php?page=update_movie&id=<?php echo $movies->getId(); ?>">Update</a>
                </td>
                <td>
                    <a class="btn btn-default" href="/index.php?page=delete_movie&id=<?php echo $movies->getId(); ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>
</div>
<br>
<a class="btn btn-default" href="/index.php?page=show">Back</a>
