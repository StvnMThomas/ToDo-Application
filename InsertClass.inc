<?php

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
		

?>