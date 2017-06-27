<?php 
class PositionDAO {
  
  //function to grab all the positions from the database
  public function getPositions($db){
    $query = "SELECT * FROM Positions";
    $statement = $db->prepare($query);
    $statement->execute();
    $positions = $statement->fetchAll();
    $statement->closeCursor();
    return $positions;
  }
  public function getPositionByProjectId($db, $projectId){
    $query = "SELECT * FROM Projects JOIN Positions ON Projects.PositionId = Positions.Id WHERE Projects.Id = :ProjectId";
    $statement = $db->prepare($query);
    $statement->bindValue(':ProjectId', $projectId);
    $statement->execute() or die(print_r($statement->errorInfo(), true));;
    $position = $statement->fetch();
    $statement->closeCursor();
    return $position;
  }
}