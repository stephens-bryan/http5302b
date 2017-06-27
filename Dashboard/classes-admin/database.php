<?php

    class Database

    {
        private static $dbname = 'c9' ;
        private static $host = 'localhost';
        private static $username = 'navpreet';
        private static $password = '';

        private static $cont  = null;

        public function __construct() {
            die('Unable to connect.');
        }

        public static function connect()
        {
           if ( null == self::$cont )
           {     
            try
            {
              self::$cont =  new PDO( "mysql:host=".self::$host.";"."dbname=".self::$dbname, self::$username, self::$password); 
            }
            catch(PDOException $e)
            {
              die($e->getMessage()); 
            }
           }
           return self::$cont;
        }
    }

?>

