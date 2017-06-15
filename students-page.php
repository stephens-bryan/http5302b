<?php require_once "includes/header.php"; ?>

<head>
  <link rel="stylesheet" href="css/student-page.css">
</head>

<body>

    <?php require_once "includes/unlogged_sidebar.php"; ?>

    <main>
    <div class="container">

        <div class="row">
            <div class="col s12 center">
                <img class="class-logo" src="img/class-of-2017-logo.svg" alt="">
            </div>
        </div>

        <br/>
        <br/>

        <!--insert project thumbnails here-->

        <div class="row">
            <div class="col l4 m6 s12">
              <?php include "project-thumbnail-small.php"; ?>
            </div>
            <div class="col l4 m6 s12">
              <?php include "project-thumbnail-small.php"; ?>
            </div>
            <div class="col l4 m6 s12">
              <?php include "project-thumbnail-small.php"; ?>
            </div>
        </div>

        <div class="row">
            <div class="col l4 m6 s12">
              <?php include "project-thumbnail-small.php"; ?>
            </div>
            <div class="col l4 m6 s12">
              <?php include "project-thumbnail-small.php"; ?>
            </div>
            <div class="col l4 m6 s12">
              <?php include "project-thumbnail-small.php"; ?>
            </div>
        </div>

    </div>
    </main>
</body>

<?php require_once "includes/footer.php"; ?>
