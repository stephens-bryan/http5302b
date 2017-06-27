<?php

if (isset($_POST['delete-account-modal__btn-delete-confirm'])) {
  require_once '../includes.php';
  require_once '../database.php';

  $accountId = 2;
  $studentId = 1;

  $accountClass = new AccountDAO();
  $deleteAccount = $accountClass->deleteAccount($pdo, $accountId);
  $deleteEnrollement = $accountClass->deleteEnrollement($pdo, $studentId);
  $deleteStudent = $accountClass->deleteStudent($pdo, $studentId);
  $deleteStudentStack = $accountClass->deleteStudentStack($pdo, $studentId);
  $deleteStudentTech = $accountClass->deleteStudentTech($pdo, $studentId);
  $deleteStudentExternals = $accountClass->deleteStudentExternals($pdo, $studentId);
  $deleteStudentProjects = $accountClass->deleteStudentProjects($pdo, $studentId);

  header('location: ../account-settings.php');
  
}

?>