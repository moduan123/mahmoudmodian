<?php
require_once './../helper/functions.php';
session_start();

$id = $_POST['id'];

deleteProject($id);

$_SESSION['success'] = "Project delete successfully.";

header('Location: ./../user.php');
