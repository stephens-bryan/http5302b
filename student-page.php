<?php
ini_set('display_errors', 3); 

require_once 'includes.php';
require_once 'database.php';
//hardcoded student id value for now
$studentId = 1;

//must grab student profile information
$student = new Students;
$student = $student->getStudentsById($pdo, $studentId);

//THIS IS GRABBING ALL PROJECTS FOR TESTING PURPOSES. THIS METHOD MUST BE SWITCHED FOR THE METHOD THAT ONLY SHOWS PROJECTS THAT ARE APPROVED AND PUBLISHED.
$projects = new ProjectDAO;
$projects = $projects->getProjectsById($pdo, $studentId);
 require_once "includes/header.php";
?>

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
          <?php foreach($student as $student) : ?>
                <div class="col s12 center">
                    <img class="circle student-page__student-information_profile-pic" src="img/<?php echo $student['ProfileImg'] ?>">
                </div>

                <!--student name-->
                <div class="col s12 center">
                    <h1 class="center-align student-page__student-information_student-name"><?php echo $student['FirstName'] . " " . $student['LastName'];?></h1>
                </div>

                <!--student contact-->
                <div class="col s12 center">
                    <p class="center-align student-page__student-information_student-description"><?php echo $student['ContactEmail']?></p>
                </div>

          <?php endforeach; ?>
                

            <!--PROJECTS INFORMATION-->
                  <?php foreach ($projects as $p):?>
                 <div><!--start of project-->

                    <!--project image-->
                    <div class="col s12 left">
                        <img class="student-page__project-information_project-image thumbnail-small" src="img/<?php echo $p['MainPicture']?>" alt="project image">
                    </div>

                    <!--project name-->
                    <div class="col s12 left">
                        <h2 class="student-page__student-information_project-name"><?php echo $p['Name']?></h2>
                    </div>
                   <div class="col s12 left">
                     <p>
                       Project Completed on: <?php echo date('M j, Y',strtotime($p['FinishDate']))?>
                     </p>
                   </div>
                   <!--project role/team project -->
                   <div class="col s12 left">
                     <p>
                       <?php 
                          $position = new PositionDAO;
                          $position = $position->getPositionByProjectId($pdo, $p['Id']);
                             if($position['Title'] !== "" && $position['Title'] !== null) echo "On this team project, I served the role of ". $position['Title'] . ".";?>
                     </p>
                   </div>

                    <!--project description-->
                    <div class="col s12 left">
                        <p class="student-page__student-information_project-description"><?php echo $p['Description']?></p>
                    </div>

                    <!--project skills-->
                    <div class="col s12 left">
                      <?php 
                          $techs = new TechDAO; 
                          $techs = $techs->getTechsByProjectId($pdo, $p['Id']);?>
                          <?php foreach ($techs as $t) :?>
                        
                        <div class="chip"><?php echo $t['Title']?></div>
                      <?php endforeach;?>
                    </div>

                    <!--Url-->
                   <?php if($p['Url'] !== "" && $p['Url'] !== null):?>
                    <div class="col s12 left">
                        <a class="student-page__project-information_student-portfolio-link waves-effect waves-light btn student-page__student-information_student-project-link" href="http://<?php echo $p['Url']?>">Go To Website</a>
                    </div>
                   <?php endif;?>
                   <!--GitHub -->
                    <?php if($p['GitHub'] !== "" && $p['GitHub'] !== null):?>
                    <div class="col s12 left">
                        <a class="student-page__project-information_student-portfolio-link waves-effect waves-light btn student-page__student-information_student-project-link" href="http://<?php echo $p['GitHub']?>">Go To GitHub Repository</a>
                    </div>
                   
                   
                   <?php endif;?>
                </div><!--end of project-->
                <?php endforeach;?>
               

        </div>

    </div>
    </main>
</body>

<?php require_once "includes/footer.php"; ?>
