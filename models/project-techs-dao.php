<?php
class ProjectTechsDAO {
  public function insertProjectTechs($db, $ProjectId, $TechId){
    $query = "INSERT INTO ProjectTechs (ProjectId, TechId) VALUES (:ProjectId, :TechId)";
    $statement = $db->prepare($query);
    $statement->bindValue(':ProjectId', $ProjectId);
    $statement->bindValue(':TechId', $TechId);
    $statement->execute() or die(print_r($statement->errorInfo(), true));
    $statement->closeCursor();
  }
}