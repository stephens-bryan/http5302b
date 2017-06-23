<?php

class DbConnect {

    private $dsn = "mysql:host=localhost;dbname=portfolio";
    private $username = "root";
    private $password = "root";
    private $db;

    public function getDb(){
        try{
            $this->db = new PDO($this->dsn, $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $this->db;
    }

}