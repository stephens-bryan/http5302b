<?php 
class TechDAO {

//function to grab all the tecnologies
  public function getTechs ($db){
    $query = "SELECT * FROM Techs";
    $statement = $db->prepare($query);
    $statement->execute();
    $techs = $statement->fetchAll();
    return $techs;
    $statement->closeCursor();
  }
  public function getTechsByProjectID($db, $projectId){
    $query = "SELECT * FROM ProjectTechs JOIN Techs ON Techs.Id = ProjectTechs.TechId WHERE ProjectId = :ProjectId";
    $statement = $db->prepare($query);
    $statement->bindValue(':ProjectId', $projectId);
    $statement->execute();
    $techs = $statement->fetchAll();
    $statement->closeCursor();
    return $techs;
  }
}