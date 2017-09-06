<?php

class View 
{
	private $connection;

	function __construct($connection){
		$this->mysqli = $connection;
	}
	
	function Query(){
		$sqlQuery = "SELECT * FROM tbl_todo_list";
		$sqlHandle = $this->mysqli->query($sqlQuery);
		
		while( $sqlField = $sqlHandle->fetch_array(MYSQLI_ASSOC)){
			print "<br>";
			print $sqlField['TaskName']. "&nbsp&nbsp";
			print "<a href='DeleteClass.php?id=".$sqlField['TaskID']."'>X</a>";
		}
	}
		
}
?>