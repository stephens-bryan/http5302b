<?php

class Students {

    public function getStudentsById($db, $id)
    {
        $query = "SELECT * FROM Students WHERE Id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute() ;
        $students = $statement->fetch();
        $statement->closeCursor();
        return $students;
    }

}