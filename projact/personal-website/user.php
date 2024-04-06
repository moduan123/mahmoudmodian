<?php include('layout/header.php'); ?>
<?php include_once './helper/functions.php' ?>
<?php include('layout/navbar.php'); ?>
<?php
$projects = getAllProjects();

?>
<div class="row ">
    <div class="col-8 mx-auto">
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success" role="alert">
                <?php
                echo getSession('success');
                ?>
            </div>
        <?php endif; ?>

        <table class="table border rounded p-3 m-3 shadow-lg p-3 mb-5 bg-white ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project) : ?>
                    <tr>
                        <th scope="row"><?= $project['id'] ?></th>
                        <td><?= $project['name'] ?></td>
                        <td><?= $project['description'] ?></td>
                        <td><img width="100px" src="uploads/<?= $project['image'] ?>" class="img-thumbnail" alt="..."></td>
                        <td>

                            <a href="edit.php?id=<?= $project['id'] ?>" class="btn btn-info">Edit</a>
                            <form class="d-inline" action="./controller/deleteProjectController.php" method="post">
                                <input type="hidden" name="id" value="<?= $project['id'] ?>">

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('layout/footer.php'); ?>