<?php
//Paul Bao

class Project{

    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    //Read 10 projects info with student info
    //$pin should be 0 for the first page, which return most recent 10 projects
    //then $pin should be 1...2...3..4.... to get rest projects
    //please use project_id and student_id as refer to project id and student id
    public function readTenProjects($pin) {
        $readQuery = 'SELECT *, projects.Id AS "project_id", students.Id AS "student_id" 
                      FROM projects JOIN students ON projects.StudentId = students.Id
                      ORDER BY projects.Id DESC LIMIT :start, 10';
        $readStmt = $this->db->prepare($readQuery);
        $readStmt->bindValue(':start', $pin * 10, PDO::PARAM_INT);
        $readStmt->execute();
        return $readStmt->fetchall(PDO::FETCH_ASSOC);
    }

    //Read 1 project info with student info
    //$projectId should be the project id
    //please use project_id and student_id as refer to project id and student id
    public function readOneProject($projectId) {
        $readQuery = 'SELECT *, projects.Id AS "project_id", students.Id AS "student_id"
                      FROM projects JOIN students ON projects.StudentId = students.Id 
                      WHERE projects.Id = :id';
        $readStmt = $this->db->prepare($readQuery);
        $readStmt->bindValue(':id', $projectId, PDO::PARAM_INT);
        $readStmt->execute();
        return $readStmt->fetch(PDO::FETCH_ASSOC);
    }

    //approve or disapprove a project
    //$projectId should be project id.$action = 1 by default,means approve project. $action = 0 means disapprove project
    //if update success, it will return 1. if update failed, it will return 0
    public function updateProjectApproved($projectId, $action = 1) {
        $updateQuery = 'UPDATE projects SET Approved = :action WHERE Id = :id';
        try {
            $updateStmt = $this->db->prepare($updateQuery);
            $updateStmt->bindValue(':id', $projectId, PDO::PARAM_INT);
            $updateStmt->bindValue(':action', $action, PDO::PARAM_INT);
            $this->db->beginTransaction();
            $updateStmt->execute();
            $this->db->commit();
            return 1;
        } catch (PDOException $e) {
            print $e->getMessage();
            $this->db->rollback();
            return 0;
        }
    }

    ///////////////////////////////////////////////////////////////////
    //You don't need functions below

    public function readUserProjects($userId) {
        $readQuery = 'SELECT * FROM projects WHERE StudentId = :id';
        $readStmt = $this->db->prepare($readQuery);
        $readStmt->bindValue(':id', $userId, PDO::PARAM_INT);
        $readStmt->execute();
        return $readStmt->fetchall(PDO::FETCH_ASSOC);
    }

}