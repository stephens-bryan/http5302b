<?php

require_once '../includes.php';
require_once '../database.php';

$accountId = $_POST['id'];

$projectClass = new ProjectDAO();
$deleteProjects = $projectClass->deleteAccount($pdo, $accountId);

$jDeleteProject = json_encode($deleteProjects);

header("Content-Type: application/json");
echo $jDeleteProject;

?>