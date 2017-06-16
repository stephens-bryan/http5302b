<?php 
class Project {
  
  
public function getProjectsById($db, $studentId){
  $query = "SELECT * FROM PROJECTS WHERE StudentId = :studentId";
  $statement = $db->prepare($query);
  $statement->bindValue(':studentId', $studentId);
  $statement->execute();
  $projects = $statement->fetchAll();
  $statement->closeCursor();
  return $projects;
  
}
  
  
}