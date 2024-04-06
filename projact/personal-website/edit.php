<?php include('layout/header.php'); ?>
<?php include_once './helper/functions.php' ?>

<?php $project = getProjectById($_GET['id']); ?>
<div class="row ">
    <div class="col-8 mx-auto">
        <form class="border rounded p-3 m-3 shadow-lg p-3 mb-5 bg-white" method="POST" enctype="multipart/form-data" action="./controller/updateProjectController.php">
            <h1 class="text-center">Edit Project</h1>
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success" role="alert">
                    <?php
                    echo getSession('success');
                    ?>
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" value="<?= $project['name'] ?>" required placeholder="Enter Project Name" autocomplete="off" autofocus value="<?= $project['name'] ?>" required placeholder="Enter Project Name" autocomplete="off" autofocus value="<?= $project['name'] ?>" required placeholder="Enter Project Name" autocomplete="off" autofocus value="<?= $project['name'] ?>" required placeholder="Enter Project Name" autocomplete="off" autofocus value="<?= $project['name'] ?>" required placeholder="Enter Project Name" autocomplete="off" autofocus value="<?= $project['name'] ?>" required placeholder="Enter Project Name" autocomplete="off" autofocus value="<?= $project['name'] ?>" required placeholder="Enter Project Name" autocomplete="off" autofocus value="<?= $project['name'] ?>" required placeholder="Enter Project Name" autocomplete="off" autofocus value="<?= $project['name'] ?>" required placeholder="Enter Project Name" autocomplete="off" autofocus value="<?= $project['name'] ?>" required placeholder="Enter Project Name" autocomplete="off" autofocus value="<?= $project['name'] ?>" required placeholder="Enter Project Name?" class="form-control" id="name" name="name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?= $project['description'] ?></textarea>
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">Image</label>
                <input class="form-control" type="file" name="file" id="file">
            </div>
            <input type="hidden" name="id" value="<?= $project['id'] ?>">
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<?php include('layout/footer.php'); ?>