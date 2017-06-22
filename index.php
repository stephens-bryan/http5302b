<?php ini_set('display_errors', 3); 

require_once 'includes.php';
require_once 'database.php';

//need to grab all the tech's from the database for our user to have tech options for their project
$students = new Students;
$studentProjectsLimit = $students->getStudentsAndProjectsLimit3($pdo);

 require_once "includes/header.php";


?>

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
          <?php foreach($studentProjectsLimit as $spl) : ?>
          
            <a href="student-page.php?student=<?php echo $spl->StudentId ?>"><div  class="col l4 m6 s12">
             
               <div class="card thumbnail-small">
        <div class="card-image">
            <svg class="thumbnail-small-header-svgs" height="24" width="238">
                <circle cx="14" cy="12" r="3" fill="white" />
                <circle cx="24" cy="12" r="3" fill="white" />
                <circle cx="34" cy="12" r="3" fill="white" />
            </svg>
            <div class="thumb-container">
              
              <!--project hero image--> 
              <img class="thumbnail-small-image" src="img/<?php echo $spl->MainPicture ?>">

              <div class="overlay">
                <div class="center text"><i class="small material-icons">visibility</i></div>
              </div>

            </div>
            <span class="thumbnail-small-footer-background valign-wrapper card-title thumbnail-small-footer">
                <div class="container thumbnail-small-footer-content-container">
                    <div class="row valign-wrapper">
                        <div class="col s2 thumbnail-small-footer-image-container valign-wrapper">

                          <!--student profile pic--> <img class="left thumbnail-small-footer-image" src="img/<?php echo $spl->ProfileImg ?>">

                        </div>
                        <div class="col s10 thumbnail-small-footer-text-container">
                          <div class="col s12 thumbnail-small-footer-text-header-container">

                          <!--student profile name--> 
                            <p class="left thumbnail-small-footer-text thumbnail-small-footer-text-header"><?php echo $spl->FirstName?> <?php echo $spl->LastName ?></p>

                          </div>

                        </div>
                    </div>
                </div>
            </span>
        </div>
    </div>

              
            </div></a>
                <?php endforeach; ?>
        </div>
      <a href="students-page.php"><p class="landing-page__see-more col s12">see more...</p></a>
      
      <div class="row">
        <div class="col s12"><div class="divider"></div></div>
      </div>

        <!--2016 project thumbnails-->


    </div>
    </main>
</body>

<?php require_once "includes/footer.php"; ?>
