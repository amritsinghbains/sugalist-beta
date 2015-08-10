

<?php

/*  
	Script for connection to the database 
*/


class Database  
{  
	const MYSQL_HOST = "localhost";  
    const MYSQL_USER = "root";  
    const MYSQL_PASS = "lollol1";  
    const MYSQL_DB = "sugalist";  	
    const TYPE = "mysql"; 
 
      
    private static $instance; // stores the MySQLi instance  
      
    private function __construct() { } // block directly instantiating  
      
    private function __clone() { } // block cloning of the object  
      
    public static function call()  
    {  
		
        // create the instance if it does not exist  
        if(!isset(self::$instance))  
        {  
			
            self::$instance = new MySQLi(self::MYSQL_HOST, self::MYSQL_USER, self::MYSQL_PASS, self::MYSQL_DB);  
            if(self::$instance->connect_error)  
            {  
                throw new Exception('MySQL connection failed: ' . self::$instance->connect_error);  
            }  
        }  
        // return the instance  
        return self::$instance;  
    }  
}  

$connexion=Database::call();
?>
