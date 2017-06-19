<?php

require_once '../includes.php';
require_once '../database.php';

$projectId = $_POST['id'];

$projectClass = new ProjectDAO();
$deleteProject = $projectClass->deleteProject($pdo, $projectId);
$deleteProjectTechs = $projectClass->deleteProjectTechs($pdo, $projectId);

?>