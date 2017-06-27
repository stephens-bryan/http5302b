<?php
require_once "includes/header.php";
if (!isset($_SESSION['user'])){
      header("Location: student-login.php");
}
ini_set('display_errors', 3); 
include('includes.php');
include('database.php');

$student = $_SESSION['user'];
$studentId = $student['Id'];
//we need to grab the id of the project the user clicked on to edit, and get the project details from the database.
$projectSelectedId = $_POST['project-to-edit'];

if (!isset($projectSelectedId)){
  header('Location:my-projects.php');
}
$project = new ProjectDAO;
$project = $project->getOneProject($pdo, $projectSelectedId);

//need to grab all the tech's from the database for our user to have tech options for their project
 $tech = new TechDAO;
 $tech = $tech->getTechs($pdo);

//we need to grab all the possible roles from the database for our user to have options for the position they served on for the project
$positions = new PositionDAO;
$positions = $positions->getPositions($pdo);

require_once "includes/header.php";

?>
<body>
    <?php 
    require_once "includes/loggedin_sidebar.php";
    ?>

    <main>

    <div class="container" id="add-project-form-container">
      <p id="upload-feedback">
      </p>
      <div class="row" id="projectSettingsForm__cont">
        
            <!--CONTENT GOES IN HERE: Please use the Materialize grid system!-->
                <img src="img/humber-logo-webDevPortal.png" class="portalLogo">
            
            <div class="col s12 myProjectsForm__header">
              
                <h2>Edit <?php echo $project['Name'];?></h2>
            </div>

            <div class="col s12">

                <form method="POST" id="update-project" enctype="multipart/form-data">

                  <!-- hidden inputs for project and image -->
                  <input type="hidden" value="<?php echo $project['Id']?>" name="project-id"/>
                  <input type="hidden" value="<?php echo $studentId?>" name="studentId"/>
                  <input type="hidden" value="<?php echo $project['MainPicture']?>" name="old-image"/>
                    <input type="hidden" value="<?php echo $studentid?>" name="StudentId"/>
                  

                  <input id="" type="text" placeholder="Project Name" name="projectName" value="<?php echo $project['Name']?>">

                  
                  
                  <input id="" type="text" placeholder="Project Description (Short)" name="ShortDescription" value="<?php if($project['ShortDesc']!== null) echo $project['ShortDesc']?>">
                    <textarea id="" class="materialize-textarea" data-length="120" placeholder="Project Description (long)" name="Description" required><?php echo $project['Description']?></textarea>

                  <input id="" type="text" placeholder="External URL" name="Url" value="<?php if($project['Url']!== null) echo $project['Url']?>"/>
                  <input id="github" type="text" placeholder="Github Repository(Optional)" name="Github" value="<?php if($project['GitHub']!== null) echo $project['GitHub']?>">

                   
                
                  
                   
              
                                
                                
                              <div class="file-field input-field col s12">
                                <div class="btn col s8">
                                  <span>Add Project Image</span>
                                  <input type="file" name="ProjectImage">
                                </div>
                                <div class="file-path-wrapper col s8">

                                  <input class="file-path" type="text" placeholder="Your uploaded image" name="mainImage" >

                                </div>
                                  
                                
                                  
                              </div>
                          <input type="checkbox" id="TeamProject" <?php if($project['TeamProject'] == 1) echo 'checked'?>  name="TeamProject"/>
                  <label for="TeamProject">Was this a team project?</label>
                  
                   <h4>
                    What role(s) did you serve for this project?
                  </h4>
                 <?php foreach($positions as $p):?> 
                  <input  type="radio" id="<?php echo $p['Title']?>" value="<?php echo $p['Id']?>" name="Position"/>
                  <label for="<?php echo $p['Title']?>"><?php echo $p['Title']?></label>
                  <?php endforeach;?> 
                            
                            
                            
                    
                    
                  <h4>
                    When was this project completed?
                  </h4>
                  <input type="date" id="FinishDate" name="FinishDate" value="When was this project completed?" value="<?php echo date('Y-m-d', strtotime($project['FinishDate']))?>">
                  
                    <h4>Technology Used for this Project(Must select at least 1).</h4>
                   <?php foreach($tech as $t):?>

                      <input type="checkbox" id="<?php echo $t['Title']?>" value="<?php echo $t['Id']?>" name="t[]" />

                  <label for="<?php echo $t['Title']?>"><?php echo $t['Title']?></label>
                  <?php endforeach; ?>
                 
            
                  
                  
              

            
                <div class="col s12">
                   <input <?php if($project['Published'] == 1) echo 'checked'; ?>  type="checkbox" id="Published" name="Published">
                  <label for="Published">Would you like to publish this project?</label> 
                    <input  type="submit" value="Save Changes" class="right btn" name="submit-project">
                    </div>
                  
                </form>  
              
            </div>
            
        </div>
    </div> 
      <div id="submission-progress">
                    
                  </div>
    </main>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script type="text/javascript" src="js/edit-project.js"></script>


</body>

<?php

require_once "includes/footer.php";
?>