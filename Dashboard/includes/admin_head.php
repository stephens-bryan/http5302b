<?php
session_start();
date_default_timezone_set('America/Toronto');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'head_components.php' ?>
</head>

<body>
    <header id="admin_head" class="z-depth-2">
        <div class="row">
            <div class="col s5">
                <h1><a href="/http5302b/Dashboard">Admin Dashboard</a></h1>
            </div>
            <!--END #header_title-->

            <div class="col s2 right-align right">
                <a class='dropdown-button' href='#' data-activates='adminDrop'>Admin<i class="material-icons">expand_more</i></a>
            </div>
            <!-- Dropdown Structure -->
            <ul id='adminDrop' class='dropdown-content'>
                <li><a href="/http5302b/includes/logout.php"><i class="material-icons">settings</i>Logout</a></li>
            </ul>
            <!--END #header_menu-->
        </div>
        <!--END .row-->
    </header>
