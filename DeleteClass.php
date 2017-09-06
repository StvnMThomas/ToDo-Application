<?php
require '../Configure_mySQL_Connection.php';

	//Establish Database Connection
	$mysql_db_connection=new mysqli(MYSQL_SERVER,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DATABASE);
	
	//Throw error on connection failure
	if ($mysql_db_connection->connect_errno) {
		die("Connection Error: " . $mysql_db_connection->connect_error);
 	}
	
	
	//Create new instance of the Delete Record class
	//Run Delete query passing the argument defined in the url 'id' value
	$deleteRow = new DeleteRcd($mysql_db_connection);
	$deleteRow->Query($_GET['id']);
	

	//redirect to main page after deletion
	header('Location: home.php');
	exit;

class DeleteRcd 
{
	private $connection;

	function __construct($connection){
		$this->mysqli = $connection;
	}
	
	function Query($deleteItem){
		$sqlQuery = "DELETE FROM tbl_todo_list WHERE TaskID = ?";
		$sqlStatement = $this->mysqli->prepare($sqlQuery);
		$sqlStatement->bind_param("i", $deleteItem);
		$sqlStatement->execute();
	}
}
		

?>