<?php

class AccountDAO {
 
  //Deletes Account
  public function deleteAccount($db, $accountId) {
    $query = 'DELETE FROM Accounts WHERE Id = :accountId';
    $statement = $db->prepare($query);
    $statement->bindValue(':accountId', $accountId, PDO::PARAM_INT);
    $row = $statement->execute();
    return $accountId;
  }
}