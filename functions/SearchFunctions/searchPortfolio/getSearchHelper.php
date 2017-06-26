<?php
/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-06-09
 * Time: 12:01 PM
 */

ini_set('display_errors', 1);

require_once '../../../includes.php';
require_once '../../../database.php';
   
$r = new Search();

$results = $r->queryHelper($pdo);
$jList = json_encode($results);
header("Content-Type: application/json");
echo $jList;





?>