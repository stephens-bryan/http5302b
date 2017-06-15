<?php
require_once('../includes.php');
require_once('../database.php');
require_once('Project.php');


$Project = new Project($pdo);

$projects0 = $Project->readTenProjects(0);
$projects1 = $Project->readTenProjects(1);
$project = $Project->readOneProject(2);
$result = $Project->updateProjectApproved(1);

//var_dump($projects0);
//var_dump($projects1);
//var_dump($projects0[0]);
//var_dump($project);
echo $result;