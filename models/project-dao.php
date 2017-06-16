<?php 
class Project {
  
  //for the signed in student to see all of their projects
public function getProjectsById($db, $studentId){
  $query = "SELECT * FROM PROJECTS WHERE StudentId = :studentId and Published = 1";
  $statement = $db->prepare($query);
  $statement->bindValue(':studentId', $studentId);
  $statement->execute();
  $projects = $statement->fetchAll();
  $statement->closeCursor();
  return $projects;
  
}
  //for the visitor to the site to see all of the projects that are approved by bernie and published by the student.
  public function getProjectsByIdApprovedAndPublished($db, $studentId){
    $query = "SELECT * FROM PROJECTS WHERE StudentId = :studentId AND Approved = 1 AND Published = 1";
    $statement = $db->prepare($query);
    $statement->bindValue(':studentId', $studentId);
    $statement->execute();
    $projects = $statement->fetchAll();
    $statement->closeCursor();
    return $projects;
  }
}