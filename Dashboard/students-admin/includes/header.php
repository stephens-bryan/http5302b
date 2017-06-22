<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-06-13
 * Time: 12:19 PM
 */

//Connect to database
require_once "Classes/DbConnect.php";
$dbc = new DbConnect();
$db = $dbc->getDb();

//instantiate Account Class
require_once "Classes/Account.php";
$account = new Account($db);

//instantiate Student Class
require_once "Classes/Student.php";
$student = new Student($db);

?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Student Module</title>
        </head>
        <body>
            <header>
                <h1>Students</h1>
            </header>
            <main>
