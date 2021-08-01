<?php
/**
Create Database class
*/
class Db
{
	private static $host = "localhost";
	private static $dbName = "job_ready";
	private static $dbUName = "root";
	private static $dbPwd = "";
	public static $instance = null;

	// Start DB connection
	public static function GetInstance(){

		if(!self::$instance) {
            self::$instance = new PDO("mysql:host=" . self::$host .
                ";dbname=" . self::$dbName,
                self::$dbUName, self::$dbPwd,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        }

		return self::$instance;
	}

	
}

?>