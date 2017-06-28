<?php

class Students {

    public function getStudentsById($db, $id)
    {

        $query = "SELECT * FROM Students WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $students = $statement->fetchAll();
        $statement->closeCursor();
        return $students;
  
  
    }
  
  public function getStudentsAndProjects($db) {
    $query =   'SELECT Students.*, Projects.*
                FROM Projects JOIN Students ON Students.Id = Projects.StudentId
                ORDER BY uploadDate ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $studentsProjects = $statement->fetchAll(PDO::FETCH_OBJ);
    $statement->closeCursor();
    return $studentsProjects;
  }
  
  public function getStudentsAndProjectsLimit3($db) {
    $query =   'SELECT Students.*, Projects.*
                FROM Projects JOIN Students ON Students.Id = Projects.StudentId
                ORDER BY uploadDate ASC
                LIMIT 3';
    $statement = $db->prepare($query);
    $statement->execute();
    $studentsProjects = $statement->fetchAll(PDO::FETCH_OBJ);
    $statement->closeCursor();
    return $studentsProjects;
  }

}
  

?>
