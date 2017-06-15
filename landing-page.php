<?php require_once "includes/header.php"; ?>

<head>
  <link rel="stylesheet" href="./css/landing-page.css">
</head>

<body>

    <?php require_once "includes/unlogged_sidebar.php"; ?>

    <main>
    <div class="container">

        <div class="row">

            <div class="col s12 center">
                <img class="humber-logo" src="img/humber-logo.svg" alt="">
            </div>

            <div class="col s12 center">
                <p class="center-align landing-page__Humber-information">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>

        </div>

        <div class="row">
          <div class="col s12"><div class="divider"></div></div>
        </div>

        <!--2017 project thumbnails-->

        <div class="row">
            <p class="landing-page__year col s12">2017</p>
            <div class="col l4 m6 s12">
              <?php include "project-thumbnail-small.php"; ?>
            </div>
            <div class="col l4 m6 s12">
              <?php include "project-thumbnail-small.php"; ?>
            </div>
            <div class="col l4 m6 s12">
              <?php include "project-thumbnail-small.php"; ?>
            </div>
            <a href="#"><p class="landing-page__see-more col s12">see more...</p></a>
        </div>

        <div class="row">
          <div class="col s12"><div class="divider"></div></div>
        </div>

        <!--2016 project thumbnails-->

        <div class="row">
            <p class="landing-page__year col s12">2016</p>
            <div class="col l4 m6 s12">
              <?php include "project-thumbnail-small.php"; ?>
            </div>
            <div class="col l4 m6 s12">
              <?php include "project-thumbnail-small.php"; ?>
            </div>
            <div class="col l4 m6 s12">
              <?php include "project-thumbnail-small.php"; ?>
            </div>
            <a href="#"><p class="landing-page__see-more col s12">see more...</p></a>
        </div>

    </div>
    </main>
</body>

<?php require_once "includes/footer.php"; ?>
