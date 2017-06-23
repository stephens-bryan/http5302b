<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-06-13
 * Time: 12:19 PM
 */

//Connect to database
require_once "/var/www/humberportfolio/http5302b/Dashboard/students-admin/Classes/DbConnect.php";
$dbc = new DbConnect();
$db = $dbc->getDb();

//instantiate Account Class
require_once "/var/www/humberportfolio/http5302b/Dashboard/students-admin/Classes/Account.php";
$account = new Account($db);

//instantiate Student Class
require_once "/var/www/humberportfolio/http5302b/Dashboard/students-admin/Classes/Student.php";
$student = new Student($db);

