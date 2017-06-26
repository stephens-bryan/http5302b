<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-06-08
 * Time: 5:37 PM
 */

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
$results = $r->searchPortfolio($pdo, $termFormatted);

$jList = json_encode($results);
header("Content-Type: application/json");
echo $jList;