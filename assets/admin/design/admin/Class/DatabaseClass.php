<?php
/**
DB Connection
*/
class DatabaseClass
{
	public $serverName="Localhost";
	public $userName="root";
	public $password="";
	public $database="crystal_events";
	public $con;
	function __construct()
	{
		$this->con=new MYSQLi($this->serverName,$this->userName,$this->password,$this->database);
	}
}
?>