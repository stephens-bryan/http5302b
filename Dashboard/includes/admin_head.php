<?php
session_start();
date_default_timezone_set('America/Toronto');
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
        <nav>
            <div class="nav-wrapper">
                <a href="/http5302b/Dashboard" class="brand-logo">Admin Dashboard</a>
                <a href="#" data-activates="mobile-admin" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-button" href="#!" data-activates="dropAdmin">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
                <ul id="mobile-admin" class="side-nav">
                    <li><a href="/http5302b/includes/logout.php">Logout<i class="material-icons right">settings</i></a></li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Dropdown Structure -->
    <ul id="dropAdmin" class='dropdown-content'>
        <li><a href="/http5302b/includes/logout.php"><i class="material-icons">settings</i>Logout</a></li>
    </ul>

    <script type='text/javascript'>
        $(document).ready(function(){
            $(".button-collapse").sideNav();
            $(".dropdown-button").dropdown();
        });
    </script>
