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
 
  //View Account
  public function viewAccount($db, $studentId) {
    $query = "SELECT * FROM Accounts JOIN Students ON Accounts.Id = Students.AccountId 
                JOIN Enrollment ON Students.Id = Enrollment.StudentId WHERE Students.Id = '$studentId'";
    $statement = $db->prepare($query);
    $statement->bindValue(':studentId', $studentId, PDO::PARAM_INT);
    $statement->execute();
    $account = $statement->fetchAll();
    $statement->closeCursor();
    return $account;
  }
 
  //Edit Account
  public function editAccount($db, $email, $password) {
    $query = "INSERT INTO Accounts( Email, PasswordHash) 
                  VALUES (:emailField, :password)";
    $statement = $db->prepare($query);
    $statement->bindValue(':emailField', $email, PDO::PARAM_STR);
    $statement->bindValue(':password', $password, PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();
    return $email;
  }

    //Edit Profile Picture
   public function editPicture($db, $profilePic) {
     $query = "INSERT INTO Students(ProfileImg) 
                  VALUES (:profilePic)";
     $statement = $db->prepare($query);
     $statement->bindValue(':profilePic', $profilePic, PDO::PARAM_STR);
     $statement->execute();
     $statement->closeCursor();
     return $profilePic;
   }
}

