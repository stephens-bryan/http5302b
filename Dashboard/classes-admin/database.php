<?php

    class Database

    {
        private static $dbname = 'portfolio' ;
        private static $host = 'portfolio.cga94bd83uty.ca-central-1.rds.amazonaws.com:3306';
        private static $username = 'teammember';
        private static $password = 'phpteam1!';

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

