<?php
	
	include('config.php');
	
	$id = $_GET['id'];
	
	 mysql_query("DELETE FROM movies WHERE id=$id") 
or die(mysql_error());

	header("Location: index.php");

?>