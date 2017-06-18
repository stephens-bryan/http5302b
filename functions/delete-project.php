<?php

require_once '../includes.php';
require_once '../database.php';

$projectId = $_POST['id'];

$projectClass = new ProjectDAO();
$deleteProjects = $projectClass->deleteProject($pdo, $projectId);

$jDeleteProject = json_encode($deleteProjects);

header("Content-Type: application/json");
echo $jDeleteProject;

?>