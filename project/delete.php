<?php
require_once('../includes.php');
require_once('../database.php');
require_once('Project.php');

$projectId = $_GET['id'];
$Project = new Project($pdo);
$project = $Project->readOneProject($projectId);

var_dump($project);