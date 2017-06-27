<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-06-08
 * Time: 5:37 PM
 */

ini_set('display_errors', 3); 

require_once '../includes.php';
require_once '../database.php';
 require_once "../includes/header.php";

$db = Db::getDB();
$r = new Search();
$results = $r->queryHelper($db);

$jList = json_encode($results);
header("Content-Type: application/json");
echo $jList;