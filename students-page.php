<?php ini_set('display_errors', 3); 

require_once 'includes.php';
require_once 'database.php';
//hardcoded student id value for now
$studentId = 1;

//need to grab all the tech's from the database for our user to have tech options for their project
$studentProjects = new Students;
$studentProjects = $studentProjects->getStudentsAndProjects($pdo);

//var_dump($studentProjects);
 require_once "includes/header.php";

?>

<head>
  <link rel="stylesheet" href="css/students-page.css">
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

          <?php foreach($studentProjects as $sp) : ?>
          
            <div class="col l4 m6 s12">
             
               <div class="card thumbnail-small">
        <div class="card-image">
            <svg class="thumbnail-small-header-svgs" height="24" width="238">
                <circle cx="14" cy="12" r="3" fill="white" />
                <circle cx="24" cy="12" r="3" fill="white" />
                <circle cx="34" cy="12" r="3" fill="white" />
            </svg>
            <div class="thumb-container">
              
              <!--project hero image--> 
              <img class="thumbnail-small-image" src="img/<?php echo $sp->MainPicture ?>">

              <div class="overlay">
                <div class="center text"><i class="small material-icons">visibility</i></div>
              </div>

            </div>
            <span class="thumbnail-small-footer-background valign-wrapper card-title thumbnail-small-footer">
                <div class="container thumbnail-small-footer-content-container">
                    <div class="row valign-wrapper">
                        <div class="col s2 thumbnail-small-footer-image-container valign-wrapper">

                          <!--student profile pic--> <img class="left thumbnail-small-footer-image" src="img/yuna.jpg">

                        </div>
                        <div class="col s10 thumbnail-small-footer-text-container">
                          <div class="col s12 thumbnail-small-footer-text-header-container">

                          <!--student profile name--> 
                            <p class="left thumbnail-small-footer-text thumbnail-small-footer-text-header"><?php echo $sp->FirstName?> <?php echo $sp->LastName ?></p>

                          </div>

                        </div>
                    </div>
                </div>
            </span>
        </div>
    </div>

              
            </div>
                <?php endforeach; ?>
        </div>


      
    </div>
    </main>
</body>

<?php require_once "includes/footer.php"; ?>
