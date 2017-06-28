<?php

class DbConnect
{
    private static $dsn = 'mysql:host=localhost;dbname=portfolio';
    private static $username = 'root';
    private static $password = 'password';
    private static $db;

    //return reference to pdo object
    public static function getDB () {

        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                    self::$username,
                    self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo $error_message;
                exit();
            }
        }
        return self::$db;
    }

}

?>
