<?php
class Database{
    private $db;
    private static $username = "root";
    private static $password = "";    
    public static function connect(){
        if (!isset(self::$db)){        
            try {
                $db = new PDO("mysql:host=localhost;dbname=dungtd", self::$username, self::$password);
                // set the PDO error mode to exception
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $db;
                }
            catch(PDOException $e)
                {
                echo "Connection failed: " . $e->getMessage();
                }      
        } else {
            return $db;
        }
    }
}
