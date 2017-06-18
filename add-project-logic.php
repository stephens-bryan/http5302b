<?php 
ini_set('display_errors', '3');

 include('includes.php');
include('database.php');

//flag variable. if form is set to false, it will not submit. also to hold our feedback to the user.
$formValid = true;
$userFeedback = '';


//grab values for project.
//================================================

//handle the image upload first
//=======
$imageName = $_FILES['ProjectImage']['name'];
  echo $imageName;

  //path of file in temp directory
  $imageTemp = $_FILES['ProjectImage']['tmp_name'];
  echo $imageTemp;

  //size of file in bytes
  $imageSize = $_FILES['ProjectImage']['size'];
echo $imageSize;

//error number
$imageError = $_FILES['ProjectImage']['error'];
echo $imageError;

//now lets move our file to the images folder.
$target_path = "img/";
$target_path = $target_path . $imageName;

if(move_uploaded_file($imageTemp, $target_path)){
  echo 'The file' . $imageName . 'has been uploaded';
}
else {
  echo 'Error uploading file';
}





//grab all required inputs
//=========
$StudentId = $_POST['StudentId'];

  //image file name
  
  
 
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
    $dateError="You must select when the project was finished.<br/>";
  }

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


//now  our hardcoded values for date uploaded and approved.
  $UploadDate = date('Y-m-d H:i:s'); 

  $Approved = 0;




                   
 
       

//insert into database if formValid variable is still true.


if ($formValid){
//  $project = new ProjectDAO;

//  $project->insertProject($pdo, $StudentId, $MainPicture, $Name, $FinishDate, $TeamProject, $PositionId, $ShortDesc, $Description, $Url, $Github, $UploadDate, $Approved, $Published);
 
// //now we have to insert technologies associated with the project into the techs table. 
// //we will do this by grabbing the id of the project that was just inserted
// //we will do this by calling a method that passes in our user id and the upload date to grab the correct project
// //this will work because upload date is unique, our user cannot upload more than 1 project in less than a second.

// //project now holds the Id of the project we just inserted above.
//   $project = $project->getProjectIDJustInserted($pdo, $StudentId, $UploadDate)[0];


// // //now for each tech that was selected, we just have to insert into our projecttech table

//  $projectTech = new ProjectTechsDAO;
//  foreach($techs as $t){
  
//   $projectTech->insertProjectTechs($pdo, $project, $t);
// }
  
  
  //now we echo a successful message back to the ajax call.
  $userFeedback = "Project was uploaded successfully";
  //echo $userFeedback;
}

//or if form was not valid, we echo all of the error messages that were set.
else {
  if(isset($imageError)) echo $imageError;
  if(isset($nameError)) echo $nameError;
  if(isset($dateError)) echo $dateError;
  if(isset($descriptionError)) echo $descriptionError;
  if(isset($techError)) echo $techError;
}
