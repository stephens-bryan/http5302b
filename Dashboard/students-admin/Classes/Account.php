<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-06-13
 * Time: 3:36 PM
 */

class Account{

    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    //get account id by username

    public function getId($username){

        $query = "SELECT Id FROM accounts
                  WHERE UserName = :UserName";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':UserName',$username, PDO::PARAM_STR);
        $pdostmt->execute();
        $id = $pdostmt->fetch();
        $pdostmt->closeCursor();

        return $id;
    }

    //add account

    public function addAccount($roleId, $username, $email, $passSalt, $passHash, $activated){

        $query = "INSERT INTO accounts (RoleId, UserName, Email, PasswordSalt, PasswordHash, Activated)
                  VALUES(:RoleId, :UserName, :Email, :PasswordSalt, :PasswordHash, :Activated)";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':RoleId', $roleId, PDO::PARAM_INT);
        $pdostmt->bindValue(':UserName', $username, PDO::PARAM_STR);
        $pdostmt->bindValue(':Email', $email, PDO::PARAM_STR);
        $pdostmt->bindValue(':PasswordSalt', $passSalt, PDO::PARAM_STR);
        $pdostmt->bindValue(':PasswordHash', $passHash, PDO::PARAM_STR);
        $pdostmt->bindValue(':Activated', $activated, PDO::PARAM_BOOL);
        $row = $pdostmt->execute();
        $pdostmt->closeCursor();

        return $row;
    }

    //delete account
    public function deleteAccount($id){

        $query = "DELETE from accounts WHERE Id = :id";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':id', $id, PDO::PARAM_INT);
        $row = $pdostmt->execute();
        $pdostmt->closeCursor();
    }

}