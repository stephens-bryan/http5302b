<?php 
class TechDAO {

//function to grab all the tecnologies
  public function getTechs ($db){
    $query = "SELECT * FROM Techs";
    $statement = $db->prepare($query);
    $statement->execute();
    $techs = $statement->fetchAll();
    return $techs;
    return $techs;
  }
}