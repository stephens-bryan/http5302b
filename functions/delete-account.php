<?php

require_once '../includes.php';
require_once '../database.php';

$accountId = $_POST['id'];

$accountClass = new AccountDAO();
$deleteAccount = $accountClass->deleteAccount($pdo, $accountId);

$jDeleteProject = json_encode($deleteAccount);

header("Content-Type: application/json");
echo $jDeleteProject;

?>