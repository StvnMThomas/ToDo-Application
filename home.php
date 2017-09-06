<html>
<body bgcolor=#f5e337>
<?PHP
require '../Configure_mySQL_Connection.php';
include "ViewClass.inc";
include "InsertClass.inc";


	//Establish Database Connection
	$mysql_db_connection=new mysqli(MYSQL_SERVER,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DATABASE);

	//Throw error on connection failure
	if ($mysql_db_connection->connect_errno) {
		die("Connection Error: " . $mysql_db_connection->connect_error);
 	}
	
	print"<h2>To-Do List</h2>"."<BR>";
	
	//Create a new View query object and run query
	$viewTbl = new View($mysql_db_connection);
	$viewTbl->Query($mysql_db_connection);
	
	
?>
<!-- HTML form input box for insert query -->
	<form method='post'>
	<input type="text" name="mysqlListitem">
	<input type="submit">
	</form>
<?php
if(isset($_POST["mysqlListitem"]) and $_POST<>null){ 
$newlistitem=$_POST["mysqlListitem"];

		//Create a new insert object and run query passing the POST value as a argument
		$insertTbl = new Insert($mysql_db_connection);
		$insertTbl->Query($newlistitem);
		
		//after submission redirect to the same page
		//this clears the POST method as a workaround for double submissions on refresh
		header('Location: home.php');
		exit;
}

?>