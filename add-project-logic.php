<?php 
ini_set('display_errors', '3');

 include('includes.php');
include('database.php');


//grab values for project.
//================================================
  //hard set the student id
  $StudentId = 1;

  $MainPicture = $_POST['mainImage'];

  $Name = $_POST['projectName'];

  $FinishDate = $_POST['FinishDate'];

//if team project has been checked it's true, if not, it's false.
if (isset($_POST['TeamProject'])){
  $TeamProject = 1;
}
else {
  $TeamProject = 0;
}

//if a position has been selected, then it's value if equal to that of the position selected, otherwise it is null.
if (isset($_POST['Position'])){
  $PositionId = $_POST['Position'];
}
else {
  $PositionId = null;
}

  $ShortDesc = $_POST['ShortDescription'];

  $Description = $_POST['Description'];

  $Url = $_POST['Url'];

  $Github = $_POST['Github'];

  $UploadDate = date('Y-m-d H:i:s'); 

  $Approved = 0;

//if the user checks published, published is set to true, otherwise it is set to false.
  if (isset($_POST['Published'])){
    $Published = 1;
  } 
else {
  $Published = 0;
}

$techs = $_POST['t'];
                   
 
       
//validate values

//insert into database if valid

 $project = new ProjectDAO;

 $project->insertProject($pdo, $StudentId, $MainPicture, $Name, $FinishDate, $TeamProject, $PositionId, $ShortDesc, $Description, $Url, $Github, $UploadDate, $Approved, $Published);
 
//now we have to insert technologies associated with the project into the techs table. 
//we will do this by grabbing the id of the project that was just inserted
//we will do this by calling a method that passes in our user id and the upload date to grab the correct project
//this will work because upload date is unique, our user cannot upload more than 1 project in less than a second.

//project now holds the Id of the project we just inserted above.
  $project = $project->getProjectIDJustInserted($pdo, $StudentId, $UploadDate)[0];


// //now for each tech that was selected, we just have to insert into our projecttech table

 $projectTech = new ProjectTechsDAO;
 foreach($techs as $t){
  
  $projectTech->insertProjectTechs($pdo, $project, $t);
}
//provide successful feedback for user.
