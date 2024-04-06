<?php

require_once './../helper/functions.php';

session_start();

// id 
// old/new name 
// old/new description 
// image optional

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];

// project 
$project = getProjectById($id);
// old project image
$projectOldImage = $project['image'];

// {{if}} user send new image >>> upload image & remove old image {{else}} old image
if (empty($_FILES['file']['name'])) {
    $image = $projectOldImage;
} else {
    $image = uploadFile('file');
    deleteFile($projectOldImage);
}

updateProject($id, $name, $description, $image);

$_SESSION['success'] = "Project update successfully.";

// header('Location: ./../edit.php');
header('Location: ./../edit.php?id=' . $id);
