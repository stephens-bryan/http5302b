<?php 
ini_set('display_errors', '3');

 include('includes.php');
include('database.php');
//grab values for project.
echo $StudentId = 1;
echo $MainPicture = $_POST['mainImage'];
 echo $Name = $_POST['projectName'];
 echo $FinishDate = $_POST['FinishDate'];
if (isset($_POST['TeamProject'])){
  $TeamProject = 1;
}
else {
  $TeamProject = 0;
}
 echo $PositionId= $_POST['Position'];
 echo $ShortDesc = $_POST['ShortDescription'];
 echo $Description = $_POST['Description'];
 echo $Url = $_POST['Url'];
 echo $Github = $_POST['Github'];
 echo $UploadDate = date('Y-m-d H:i:s'); 
 echo $Approved = 0;

//check if published has been checked.
  if (isset($_POST['Published'])){
    $Published = 1;
  } 
else {
  $Published = 0;
}
echo $Published;
                    
 
//grab values for technology used and the position the user served on the project
                    
//  $techs;
//  $positions;                   

//validate values

//insert into database if valid

$project = new ProjectDAO;

   $project->insertProject($pdo, $StudentId, $MainPicture, $Name, $FinishDate, $TeamProject, $PositionId, $ShortDesc, $Description, $Url, $Github, $UploadDate, $Approved, $Approved);
 

//provide successful feedback for user.
