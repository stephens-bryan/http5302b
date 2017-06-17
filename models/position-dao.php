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
}