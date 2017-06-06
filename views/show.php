<?php
/* @var Model $model */
require "header.php";
?>
<div class="row">
    <div class="col-lg-6 col-sm-12">
    <h2>Directors</h2>
    <table class="table-striped">
        <tr>
            <th>Name</th>
            <th>Birth-year</th>
            <th>Nationality</th>
            <th>Update</th>
            <th>Delete</th>
            <th>Info</th>
        </tr>
        <?php
        foreach ($this->model->readAll() as $directors):
            /* @var Director $directors */
        ?>
            <tr>
                <td><?php echo $directors->getName(); ?></td>
                <td><?php echo $directors->getBirthYear(); ?></td>
                <td><?php echo $directors->getNationality();?></td>
                <td>
                    <a class="btn btn-default" href="/index.php?page=update_director&id=<?php echo $directors->getId(); ?>">Update</a>
                </td>
                <td>
                    <a class="btn btn-default" href="/index.php?page=delete_director&id=<?php echo $directors->getId(); ?>">Delete</a>
                </td>
                <td>
                    <a class="btn btn-default" href="/index.php?page=show_movies&id=<?php echo $directors->getId(); ?>">Info</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
    </div>
</div>

<?php
require "footer.php";
?>