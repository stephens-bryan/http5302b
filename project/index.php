<?php
require_once('../includes.php');
require_once('../database.php');
require_once('Project.php');

$userId = $_GET['id'];
$Project = new Project($pdo);
$projects = $Project->readUserProjects($userId);

var_dump($projects);