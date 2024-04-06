<?php

function uploadFile($inputName)
{
    $file = $_FILES[$inputName];

    $file_temp_name = $file['tmp_name'];

    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

    $fileName = uniqid() . '.' . $extension;

    move_uploaded_file($file_temp_name, __DIR__ . '/../uploads/' . $fileName);

    return $fileName;
}

function createNewProject(array $newProjectData)
{
    $projects = getAllProjects();

    $projects[] = $newProjectData;

    saveAllProjects($projects);
}

function getAllProjects()
{
    $projects = file_get_contents(__DIR__ . '/../data/projects.json');

    $projects = json_decode($projects, true);

    return $projects;
}

function saveAllProjects($projects)
{
    $projects = json_encode($projects);
    file_put_contents(__DIR__ . '/../data/projects.json', $projects, JSON_PRETTY_PRINT);
}

function getSession($key)
{
    $value = $_SESSION[$key];
    unset($_SESSION[$key]);
    return $value;
}

function deleteProject($id)
{
    $projects = getAllProjects();

    foreach ($projects as $key => $project) {
        if ($project['id'] == $id) {
            deleteFile($project['image']);
            unset($projects[$key]);
        }
    }

    saveAllProjects($projects);
}

function deleteFile($fileName)
{
    unlink(__DIR__ . '/../uploads/' . $fileName);
}

function getProjectById($id)
{
    $projects = getAllProjects();

    foreach ($projects as $project) {
        if ($project['id'] == $id) {
            return $project;
        }
    }
}

function updateProject($id, $name, $description, $image)
{
    $projects = getAllProjects();

    foreach ($projects as &$project) {
        if ($project['id'] == $id) {
            $project['name'] = $name;
            $project['description'] = $description;
            $project['image'] = $image;
        }
    }

    saveAllProjects($projects);
}