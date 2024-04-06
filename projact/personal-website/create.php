<?php include('layout/header.php'); ?>
<?php include_once './helper/functions.php' ?>
<div class="row ">
    <div class="col-8 mx-auto">
        <form class="border rounded p-3 m-3 shadow-lg p-3 mb-5 bg-white" method="POST" enctype="multipart/form-data" action="./controller/createProjectController.php">
            <h1 class="text-center">Create Project</h1>
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success" role="alert">
                    <?php
                    echo getSession('success');
                    ?>
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">Image</label>
                <input class="form-control" type="file" name="file" id="file">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
<?php include('layout/footer.php'); ?>