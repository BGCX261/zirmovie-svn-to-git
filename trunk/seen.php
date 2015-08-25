<?php
	include('config.php');
	
	$id = $_GET['id'];
	$status = 1;
	
	mysql_query("UPDATE movies SET seen=$status WHERE  id=$id") 
or die(mysql_error());

	header("Location: index.php");
	
?>