<?php
session_start();
date_default_timezone_set('America/Toronto');

//  This can be a variable of how many unpublished
//  projects there are in the database
$unpublished = 3;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin Dashboard - Humber Web Development</title>

    <!-- Materialize Script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>

    <!-- Materialize Style-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    <link rel="stylesheet" href="/http5302b/Dashboard/includes/style/admin_style.css" type="text/css">
    <link rel="stylesheet" href="/http5302b/Dashboard/includes/style/style.css" type="text/css">
</head>

<body>
    <header id="admin_head" class="z-depth-2">
        <!--  Responsive navbar with sideNav using materialize  -->
        <nav class="nav-extended">
            <div class="nav-wrapper">
                <a href="/http5302b/Dashboard" class="brand-logo">Admin Dashboard</a>
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-button" href="#!" data-activates="dropAdmin">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
                <!-- Slide Navigation

                <div class="nav-content">
                  <ul class="tabs tabs-transparent">
                    <li class="tab"><a href="/http5302b/Dashboard/students-admin/list_student.php">Students</a></li>
                    <li class="tab"><a href="/http5302b/Dashboard/project-admin">Projects</a></li>
                    <li class="tab"><a href="/http5302b/Dashboard/classes-admin/classes-index.php">Classes</a></li>
                  </ul>
                </div>

                -->
            </div>
        </nav>
    </header>
    <!-- Dropdown Structure -->
    <ul id="dropAdmin" class='dropdown-content'>
        <li><a href="/http5302b/includes/logout.php"><i class="material-icons">settings</i>Logout</a></li>
    </ul>
    <!-- Side Nav Structure -->
    <ul id="slide-out" class="side-nav">
        <li><h4>&emsp;Menu</h4></li>
        <!-- Main Navigation Links -->
        <li><a href="/http5302b/Dashboard"><i class="material-icons">home</i>Dashboard</a></li>
        <li><a href="/http5302b/Dashboard/students-admin/list_student.php"><i class="material-icons">supervisor_account</i>Manage Students</a></li>
            <!-- Dynamic Project Notifications -->
        <li><a href="/http5302b/Dashboard/project-admin"><i class="material-icons">art_track</i>Manage Projects<?php echo ($unpublished >= 1)? '<span id="unpublished" class="new badge">'.$unpublished.'</span>' : '' ;?></a></li>
        <li><a href="/http5302b/Dashboard/classes-admin/classes-index.php"><i class="material-icons">class</i>Manage Classes</a></li>
        <!-- Secondary Navigation Links -->
        <li><div class="divider"></div></li>
        <li><a href="/http5302b/includes/logout.php"><i class="material-icons">settings</i>Logout</a></li>
    </ul>
    <script type='text/javascript'>
        // Initialize Materialize Functions
        $(document).ready(function(){
            $(".button-collapse").sideNav();
            $(".dropdown-button").dropdown();
        });
    </script>
