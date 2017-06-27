<?php 
ini_set('display_errors', '3');
require_once '../includes.php';
require_once '../database.php';



//flag variable. if form is set to false, it will not submit. also to hold our feedback to the user.
$formValid = true;
$userFeedback = '';


//grab values for project.
//================================================

//grab these two things as they will be used for our image name.
 $projectId = $_POST['project-id'];
 $StudentId = $_POST['studentId'];
 $UploadDate = date('Y-m-d H:i:s'); 

//must grab the current mainimage value from the database so that we can delete that old img in our img folder

$projectImg = new ProjectDAO;
  $projectImg = $projectImg->getProjectImg($pdo, $projectId);
$projectImage = $projectImg['MainPicture'];

//grab all required inputs
//=========


  //image name
   $MainPicture = $_POST['mainImage'];
if(empty($MainPicture)){
  $formValid = false;
    $imageError = "You must upload an image.<br/>";
}
 
   $Name = $_POST['projectName'];
if(empty($Name)){
  $formValid = false;
   $nameError = "You must name the project<br/>";
} 
 $FinishDate = $_POST['FinishDate'];
  if(empty($FinishDate)){
    $formValid = false;
     $dateEmptyError="You must select when the project was finished.<br/>";
  } 
if (!preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $FinishDate)){
    $formValid = false;
  $dateError = "Invalid date entered. Must be in format yyyy/mm/dd.<br/>";
} 
//error before this
   $Description = $_POST['Description'];
  if(empty($Description)){
    $formValid = false;
     $descriptionError="You must give a description for the project<br/>";
  } 
if(isset($_POST['t'])){
   $techs = $_POST['t'];
}
else{
  $formValid = false;
   $techError ="You must select at least one technology used<br/>";
} 

//now our values that can be null
//============

//if the user checks published, published is set to true, otherwise it is set to false.
  if (isset($_POST['Published'])){
     $Published = 1;
  }  
else {
  $Published = 0;
}
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


   $Url = $_POST['Url'];

   $Github = $_POST['Github'];


//now  our hardcoded value for approved.


  $Approved = 0;



                   
 //handle the image upload if the rest of the form is valid
//=======

if ($formValid){
//we are going to grab the image name but add on the current time and the student id to make it unique.
$imageName = $StudentId . $UploadDate . $_FILES['ProjectImage']['name'];
  //path of file in temp directory
  $imageTemp = $_FILES['ProjectImage']['tmp_name'];

  //size of file in bytes
  $imageSize = $_FILES['ProjectImage']['size'];
//error number
$imageError = $_FILES['ProjectImage']['error'];

//if there are file errors.
if ($imageError > 0){
  $formValid = false;
  $imageSizeError = "Image uploaded was too large";
}

//now lets move our file to the images folder.
$target_path = "../img/";
$target_path = $target_path . $imageName;



//check if it actually is an image. if it is, move it, if not, send feedback.
if (getimagesize($imageTemp)){
  //check if the image name is less than 50 characters. It must be, to be stored in the database.
      if (strlen($imageName)>50)  {
        $formValid = false;
          $imageLengthError =  ' The image name is too large.' . $imageName;
      }
      elseif(move_uploaded_file($imageTemp, $target_path)){
        //set the value to be inserted into our database as mainimage
        $imageValue = $imageName;
      }
      else {
         $imageGeneralError = 'Error uploading file';
        $formValid = false;
      }
} 
else {
  $formValid = false;
  $notImageError = "This is not an image";
}
       
}
//final check before we delete the old image
if ($formValid){
  $delete  = "../img/"; 
  if(unlink($delete .$projectImage)){
    $deleted = 'the image was deleted';
  }
  else {
    echo 'not deleted';
    $formValid = false;
  }
}


//insert into database if formValid variable is still true after attempting to upload an image
//we don't want to upload an image without inserting a project into the database.


if ($formValid){
  $project = new ProjectDAO;

  $project->updateProject($pdo, $projectId, $imageValue, $Name, $FinishDate, $TeamProject, $PositionId, $ShortDesc, $Description, $Url, $Github, $UploadDate, $Approved, $Published);
 
// //now we delete all of the projecttech values with this project id
  
  $project->deleteProjectTechs($pdo, $projectId);

// //project now holds the Id of the project we just inserted above.
   


// // //now for each tech that was selected, we just have to insert into our projecttech table

  $projectTech = new ProjectTechsDAO;
  foreach($techs as $t){
  
   $projectTech->insertProjectTechs($pdo, $projectId, $t);
 }
  
  
  //now we echo a successful message back to the ajax call.
  $userFeedback = "Project was edited successfully";
  echo $userFeedback;
}

//or if form was not valid, we echo all of the error messages that were set.
else {
  if(isset($imageError)) echo $imageError;
  if(isset($nameError)) echo $nameError;
  if(isset($dateEmptyError)) echo $dateEmptyError;
  if(isset($dateError)) echo $dateError;
  if(isset($descriptionError)) echo $descriptionError;
  if(isset($techError)) echo $techError;
  if(isset($imageGeneralError)) echo $imageGeneralError;
  if(isset($imageLengthError)) echo $imageLengthError;
  if(isset($imageSizeError)) echo $imageSizeError;
  if(isset($notImageError)) echo $notImageError;
}
