   <?php
   
   include('numword.php');
   
    # Misc Info
        $siteName = "My Movie Database";
        $time = time();

    // Database credientals
    $db_user = "root";
    $db_pass = "";
    $db_name = "movies";
    
        mysql_connect("localhost", $db_user, $db_pass) or die(mysql_error());
    	$con = mysql_connect("localhost", $db_user, $db_pass) or die(mysql_error());    
        mysql_select_db("movies") or die("Couldn't connect :".mysql_error());
        
        ?>