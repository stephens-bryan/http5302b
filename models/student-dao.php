<php

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

}