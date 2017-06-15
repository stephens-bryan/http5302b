<?php require_once "includes/header.php"; ?>

<head>
  <link rel="stylesheet" href="./css/student-page.css">
</head>

<body>
    <?php require_once "includes/unlogged_sidebar.php"; ?>

    <main>
    <div class="container">

        <div class="row">

            <div class="col s12 center">
                <img class="class-logo" src="img/class-of-2017-logo.svg" alt="">
            </div>

            <!--STUDENT INFORMATION-->

                <!--student profile pic-->
                <div class="col s12 center">
                    <img class="circle student-page__student-information_profile-pic" src="img/yuna.jpg">
                </div>

                <!--student name-->
                <div class="col s12 center">
                    <h1 class="center-align student-page__student-information_student-name">Dennis Nedry</h1>
                </div>

                <!--student description-->
                <div class="col s12 center">
                    <p class="center-align student-page__student-information_student-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>

                <!--optional button-->
                <div class="col s12 center">
                    <a class="waves-effect waves-light btn student-page__student-information_student-portfolio-link">Go To Portfolio</a>
                </div>

            <!--PROJECTS INFORMATION-->

                <div><!--project 1-->

                    <!--project image-->
                    <div class="col s12 left">
                        <img class="student-page__project-information_project-image" src="img/sample-1.jpg" alt="">
                    </div>

                    <!--project name-->
                    <div class="col s12 left">
                        <h2 class="student-page__student-information_project-name">Project Name</h2>
                    </div>

                    <!--project description-->
                    <div class="col s12 left">
                        <p class="student-page__student-information_project-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    <!--project skills-->
                    <div class="col s12 left">
                        <div class="chip">jQuery</div><div class="chip">asp.net</div><div class="chip">php</div>
                    </div>

                    <!--optional button-->
                    <div class="col s12 left">
                        <a class="student-page__project-information_student-portfolio-link waves-effect waves-light btn student-page__student-information_student-project-link">Go To Website</a>
                    </div>

                </div><!--end of project1-->

                <div><!--start of project 2-->

                    <!--project image-->
                    <div class="col s12 left">
                        <img class="student-page__project-information_project-image" src="img/sample-1.jpg" alt="">
                    </div>

                    <!--project name-->
                    <div class="col s12 left">
                        <h2 class="student-page__student-information_project-name">Project Name</h2>
                    </div>

                    <!--project description-->
                    <div class="col s12 left">
                        <p class="student-page__student-information_project-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    <!--project skills-->
                    <div class="col s12 left">
                        <div class="chip">jQuery</div><div class="chip">asp.net</div><div class="chip">php</div>
                    </div>

                    <!--optional button-->
                    <div class="col s12 left">
                        <a class="student-page__project-information_student-portfolio-link waves-effect waves-light btn student-page__student-information_student-project-link">Go To Website</a>
                    </div>

                </div><!--end of project2-->

        </div>

    </div>
    </main>
</body>

<?php require_once "includes/footer.php"; ?>
