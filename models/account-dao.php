<?php

class AccountDAO {
 
  //Deletes Account
  public function deleteAccount($db, $accountId) {
    $query = 'DELETE FROM Accounts WHERE Id = :accountId';
    $statement = $db->prepare($query);
    $statement->bindValue(':accountId', $accountId, PDO::PARAM_INT);
    $row = $statement->execute();
    return true;
  }
  
  //Deletes Student
  public function deleteStudent($db, $studentId) {
    $query = 'DELETE FROM Students WHERE Id = :studentId';
    $statement = $db->prepare($query);
    $statement->bindValue(':studentId', $studentId, PDO::PARAM_INT);
    $row = $statement->execute();
    return true;
  }
  
  //Deletes Account
  public function deleteStudentStack($db, $studentId) {
    $query = 'DELETE FROM StudentStacks WHERE StudentId = :studentId';
    $statement = $db->prepare($query);
    $statement->bindValue(':studentId', $studentId, PDO::PARAM_INT);
    $row = $statement->execute();
    return true;
  }
  
  //Deletes Account
  public function deleteStudentTech($db, $studentId) {
    $query = 'DELETE FROM StudentTechs WHERE StudentId = :studentId';
    $statement = $db->prepare($query);
    $statement->bindValue(':studentId', $studentId, PDO::PARAM_INT);
    $row = $statement->execute();
    return true;
  }
  
  //Deletes Account
  public function deleteStudentExternals($db, $studentId) {
    $query = 'DELETE FROM StudentExternals WHERE StudentId = :studentId';
    $statement = $db->prepare($query);
    $statement->bindValue(':studentId', $studentId, PDO::PARAM_INT);
    $row = $statement->execute();
    return true;
  }
  
  //Deletes Project
  public function deleteStudentProjects($db, $studentId) {
    $query = 'DELETE FROM Projects WHERE StudentId = :studentId';
    $statement = $db->prepare($query);
    $statement->bindValue(':studentId', $studentId, PDO::PARAM_INT);
    $row = $statement->execute();
    return true;
  }
  
   //Deletes Student
  public function deleteEnrollement($db, $studentId) {
    $query = 'DELETE FROM Enrollment WHERE StudentId = :studentId';
    $statement = $db->prepare($query);
    $statement->bindValue(':studentId', $studentId, PDO::PARAM_INT);
    $row = $statement->execute();
    return true;
  }
}