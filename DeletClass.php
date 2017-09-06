<?php
require '../Configure_mySQL_Connection.php';

	//Establish Database Connection
	$mysql_db_connection=new mysqli(MYSQL_SERVER,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DATABASE);
	
	//Throw error on connection failure
	if ($mysql_db_connection->connect_errno) {
		die("Connection Error: " . $mysql_db_connection->connect_error);
 	}
	print "test";
	$sqlQuery = "DELETE FROM tbl_todo_list WHERE TaskID = ?";
	$sqlStatement = $this->$mysql_db_connection->prepare($sqlQuery);
	$sqlStatement->bind_param("i", $_GET['id']));
	$sqlStatement->execute();

/*
class Insert 
{
	private $connection;

	function __construct($connection){
		$this->mysqli = $connection;
	}
	
	function Query($newItem){
		$sqlQuery = "INSERT INTO tbl_todo_list(TaskName) VALUES(?)";
		$sqlStatement = $this->mysqli->prepare($sqlQuery);
		$sqlStatement->bind_param("s", $newItem);
		$sqlStatement->execute();
		}
	}
		*/

?>