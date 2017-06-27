<?php 
class ProjectDAO {
  
  //for the signed in student to see all of their projects
public function getProjectsById($db, $studentId){
  $query = "SELECT * FROM Projects WHERE StudentId = :studentId and Published = 1";
  $statement = $db->prepare($query);
  $statement->bindValue(':studentId', $studentId, PDO::PARAM_INT);
  $statement->execute();
  $projects = $statement->fetchAll();
  $statement->closeCursor();
  return $projects;
  
}
  //for the visitor to the site to see all of the projects that are approved by bernie and published by the student.
  public function getProjectsByIdApprovedAndPublished($db, $studentId){
    $query = "SELECT * FROM Projects WHERE StudentId = :studentId AND Approved = 1 AND Published = 1";
    $statement = $db->prepare($query);
    $statement->bindValue(':studentId', $studentId, PDO::PARAM_INT);
    $statement->execute();
    $projects = $statement->fetchAll();
    $statement->closeCursor();
    return $projects;
  }
  
  //Deletes Project
  public function deleteProject($db, $projectId) {
    $query = 'DELETE FROM Projects WHERE Id = :projectId';
    $statement = $db->prepare($query);
    $statement->bindValue(':projectId', $projectId, PDO::PARAM_INT);
    $row = $statement->execute();
    return $projectId;
  }
  
  //Deletes Project Techs
  public function deleteProjectTechs($db, $projectId) {
    $query = 'DELETE FROM ProjectTechs WHERE ProjectId = :projectId';
    $statement = $db->prepare($query);
    $statement->bindValue(':projectId', $projectId, PDO::PARAM_INT);
    $row = $statement->execute();
    return $projectId;
  }


  //insert a project by user_id
  public function insertProject($db, $studentId, $mainPicture, $name, $finishDate, $teamProject, $positionId, $shortDesc, $Description, $Url, $Github, $uploadDate, $Approved, $Published){
    $query = "INSERT INTO Projects (StudentId, MainPicture, Name, FinishDate, TeamProject, PositionId, ShortDesc, Description, Url, Github, UploadDate, Approved, Published) VALUES (:StudentId, :MainPicture, :Name, :FinishDate, :TeamProject, :PositionId, :ShortDesc, :Description, :Url, :Github, :UploadDate, :Approved, :Published)";
    $statement = $db->prepare($query);
    $statement->bindValue(':StudentId', $studentId);
    $statement->bindValue(':MainPicture', $mainPicture);
    $statement->bindValue(':Name', $name);
    $statement->bindValue(':FinishDate', $finishDate);
    $statement->bindValue(':TeamProject', (bool)$teamProject, PDO::PARAM_BOOL);
    $statement->bindValue(':PositionId', $positionId);
    $statement->bindValue(':ShortDesc', $shortDesc);
    $statement->bindValue(':Description', $Description);
    $statement->bindValue(':Url', $Url);
    $statement->bindValue(':Github', $Github);
    $statement->bindValue(':UploadDate', $uploadDate);
    $statement->bindValue(':Approved', (bool)$Approved, PDO::PARAM_BOOL);
    $statement->bindValue(':Published', (bool)$Published, PDO::PARAM_BOOL);
    $statement->execute() or die(print_r($statement->errorInfo(), true));;
    $statement->closeCursor();  
  }
  //this method is executed so that we can grab the last project that was added in project table and then using this id, insert the technology used for the project in the projecttechs table
  //this occurs in the add-project-logic.php file.
  public function getProjectIDJustInserted($db, $studentId, $uploadDate){
    $query =  "SELECT Id FROM Projects WHERE StudentId = :StudentId AND UploadDate = :UploadDate";
    $statement = $db->prepare($query);
    $statement->bindValue(':StudentId', $studentId);
    $statement->bindValue(':UploadDate', $uploadDate);
    $statement->execute();
    $project = $statement->fetch();
    $statement->closeCursor();
    return $project;
  }
  public function updateProject($db, $id, $mainPicture, $name, $finishDate, $teamProject, $positionId, $shortDesc, $Description, $Url, $Github, $uploadDate, $Approved, $Published){
  $query = "UPDATE Projects SET MainPicture = :mainPicture, Name = :name, FinishDate = :finishDate, TeamProject = :teamProject, PositionId = :positionId, ShortDesc = :shortDesc, Description = :description, Url = :url, GitHub = :github, UploadDate = :uploadDate, Approved = :approved, Published = :published WHERE Id = :id";
  $statement = $db->prepare($query);
  $statement->bindValue(':mainPicture', $mainPicture);
  $statement->bindValue(':name', $name);
  $statement->bindValue(':finishDate', $finishDate);
  $statement->bindValue(':teamProject', (bool)$teamProject, PDO::PARAM_BOOL);
  $statement->bindValue(':positionId', $positionId);
  $statement->bindValue(':shortDesc', $shortDesc);
  $statement->bindValue(':description', $Description);
  $statement->bindValue(':url', $Url);
  $statement->bindValue(':github', $Github);
  $statement->bindValue(':uploadDate', $uploadDate);
  $statement->bindValue(':approved', (bool)$Approved, PDO::PARAM_BOOL);
  $statement->bindValue(':published', (bool)$Published, PDO::PARAM_BOOL);
  $statement->bindValue(':id', $id);
  $statement->execute() or die(print_r($statement->errorInfo(), true));
  $statement->closeCursor();
}
  public function getOneProject($db, $projectId){
    $query = "SELECT * FROM Projects WHERE Id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $projectId);
    $statement->execute()or die(print_r($statement->errorInfo(), true));
    $project = $statement->fetch();
    $statement->closeCursor();
    return $project;
  }
  public function getProjectImg($db, $projectId){
    $query = "SELECT MainPicture FROM Projects WHERE Id = :projectId";
    $statement = $db->prepare($query);
    $statement->bindValue(':projectId', $projectId);
    $statement->execute();
    $image = $statement->fetch();
    $statement->closeCursor();
    return $image;
  }
}

