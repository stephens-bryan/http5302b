<?php

class Project{

    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    public function readUserProjects($userId) {
        $readQuery = 'SELECT * FROM projects WHERE StudentId = :id';
        $readStmt = $this->db->prepare($readQuery);
        $readStmt->bindValue(':id', $userId, PDO::PARAM_INT);
        $readStmt->execute();
        return $readStmt->fetchall(PDO::FETCH_ASSOC);
    }

    public function readOneProject($projectId) {
        $readQuery = 'SELECT * FROM projects WHERE Id = :id';
        $readStmt = $this->db->prepare($readQuery);
        $readStmt->bindValue(':id', $projectId, PDO::PARAM_INT);
        $readStmt->execute();
        return $readStmt->fetch(PDO::FETCH_ASSOC);
    }

}