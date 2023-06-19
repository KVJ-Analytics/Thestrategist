<?php
class db
{
	public $db_connection;
	var $query;
	var $db;
	
	var $connect;
	var $res;
	//--------------------Open Connection----------------
	function dbCon()
	{
		
		
		$this->db_connection =  new PDO('mysql:host=localhost;dbname=readersclub','admin','admin');
		if (!$this->db_connection)
		{
		
		return false;
		}
		else
		{
			return $this->db_connection;
		}
		
	}
	//--------------------End of Open Connection----------------
	
	//--------------------Select ----------------
	function selectquery($qry)
	{
	$DB=$this->db_connection;
	$sql=$DB->$query($qry);
	return $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	//--------------------End of Select ----------------
	
	
	//--------------------Insert,update or delete----------------
	function executequery($qry)  
	{
	$DB=$this->db_connection;
	$this->res=$DB->exec($this->db_connection,$qry);
	mysqli_close($this->db_connection);
	}	
	//--------------------End of Insert,update or delete----------------
	
	//--------------------Connection Close----------------
    function dbClose()
	{
	mysqli_close($this->db_connection);
	}
	//--------------------end of Connection Close----------------
}
?>
