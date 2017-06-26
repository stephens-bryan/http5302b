<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-06-13
 * Time: 11:51 AM
 */

class Student {

    private $db;


    public function __construct($db){
        $this->db = $db;
    }

    //***Get Date***

    public function getDate(){

        $date = new DateTime();
        $dateFormat = $date->format('Y-m-d H:i:s');

        return $dateFormat;

    }

    //***List students***

    public function getStudents() {

        $query = "SELECT * FROM Students";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->execute();
        $students = $pdostmt->fetchAll();
        $pdostmt->closeCursor();

        return $students;
    }//end getStudents

    //***Get One Student***

    public function getStudentById($id){

        $query = "SELECT * FROM Students
                  WHERE Id = :id";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':id', $id, PDO::PARAM_INT);
        $pdostmt->execute();
        $student = $pdostmt->fetch();
        $pdostmt->closeCursor();

        return $student;

    }//end getStudentById()

    //***Add Student***

    public function
    addStudent($accountId, $profileImg, $firstName, $lastName, $studentNum, $email, $lastUpdate, $phoneNum, $currentJob){

        $query = "INSERT INTO Students
                  (AccountId, ProfileImg, FirstName, LastName, StudentNumber, ContactEmail, LastUpdate, ContactNumber, CurrentJob)
                  VALUES(:AccountId, :ProfileImg, :FirstName, :LastName, :StudentNumber, :ContactEmail, :LastUpdate, :ContactNumber, :CurrentJob )";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':AccountId', $accountId, PDO::PARAM_INT);
        $pdostmt->bindValue(':ProfileImg', $profileImg, PDO::PARAM_STR);
        $pdostmt->bindValue(':FirstName', $firstName, PDO::PARAM_STR);
        $pdostmt->bindValue('LastName', $lastName, PDO::PARAM_STR);
        $pdostmt->bindValue(':StudentNumber', $studentNum, PDO::PARAM_STR);
        $pdostmt->bindValue(':ContactEmail', $email, PDO::PARAM_STR);
        $pdostmt->bindValue(':LastUpdate', $lastUpdate, PDO::PARAM_STR);
        $pdostmt->bindValue(':ContactNumber', $phoneNum, PDO::PARAM_STR);
        $pdostmt->bindValue(':CurrentJob', $currentJob, PDO::PARAM_STR);
        $row = $pdostmt->execute();
        $pdostmt->closeCursor();

        return $row;
    }//end addStudent

    //***Update Student***
    public function updateStudent($profileImg, $firstName, $lastName, $studentNum, $email, $lastUpdate, $phoneNum, $currentJob, $id){

        $query = "UPDATE Students
                  SET ProfileImg = :ProfileImg,
                  FirstName = :FirstName,
                  LastName = :LastName,
                  StudentNumber = :StudentNumber,
                  ContactEmail = :ContactEmail,
                  LastUpdate = :LastUpdate,
                  ContactNumber = :ContactNumber,
                  CurrentJob = :CurrentJob
                  WHERE Id = :id";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':ProfileImg',$profileImg,PDO::PARAM_STR);
        $pdostmt->bindValue(':FirstName', $firstName, PDO::PARAM_STR);
        $pdostmt->bindValue(':LastName', $lastName, PDO::PARAM_STR);
        $pdostmt->bindValue(':StudentNumber', $studentNum, PDO::PARAM_STR);
        $pdostmt->bindValue(':ContactEmail', $email, PDO::PARAM_STR);
        $pdostmt->bindValue(':LastUpdate', $lastUpdate, PDO::PARAM_STR);
        $pdostmt->bindValue(':ContactNumber', $phoneNum, PDO::PARAM_STR);
        $pdostmt->bindValue(':CurrentJob', $currentJob, PDO::PARAM_STR);
        $pdostmt->bindValue(':id', $id, PDO::PARAM_INT);
        $row = $pdostmt->execute();
        $pdostmt->closeCursor();


    }//end updateStudent

    //***Delete Student***

    public function deleteStudent($id){
        $query = "DELETE FROM Students WHERE Id = :id";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':id',$id,PDO::PARAM_INT);
        $row = $pdostmt->execute();
        $pdostmt->closeCursor();

        return $row;

    }//end deleteStudent

    //***Get Acccount Id By student id***

    public function getAccountId($id){
        $query = "SELECT AccountId FROM Students
                  WHERE Id = :id";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':id', $id, PDO::PARAM_INT);
        $accountId = $pdostmt->fetch();
        $pdostmt->closeCursor();

        return $accountId;
    }

}//end class Student
