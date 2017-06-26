<?php

ini_set('display_errors', 1);

require_once '../../../includes.php';
require_once '../../../database.php';
require_once "../search.php";

$term = $_POST['term'];
$termTrimmed = trim($term);
$termFormatted = '%' . $termTrimmed . '%';

$pdo = new PDO(
    'mysql:host='.HOST.';dbname='.DATABASE,
    USERNAME,
    PASSWORD );

$r = new Search();
$results = $r->searchStudents($pdo, $termFormatted);

$jList = json_encode($results);
header("Content-Type: application/json");
echo $jList;