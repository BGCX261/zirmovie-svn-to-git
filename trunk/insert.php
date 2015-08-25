<?php


	include("config.php");

	if(isset($_GET['submit'])){
		$name = mysql_real_escape_string($_GET['name']);
		$link = $_GET['link'];
		$description = mysql_real_escape_string($_GET['description']);
		$time = time();
		
		
		mysql_select_db("movies") or die("Couldn't connect :".mysql_error());
		$sql = "INSERT INTO movies (name, link, date, description) VALUES ('$name', '$link', NOW(), '$description')";
	
			mysql_query($sql);
			
			
			#$sql = "FLUSH PRIVILEGES";
			#mysql_query($sql) or die('Error, insert query failed');
			
			
			echo "data inserted";
		}
	
header("Location: index.php");	

		
?>