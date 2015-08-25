<?php

	
 	include ("config.php");
		
		$sql = "SELECT id, name, description, date, link, seen
				FROM movies
				ORDER BY date DESC";
		
		$rs = mysql_query($sql) or die(mysql_error());
		if(mysql_num_rows($rs) > 0){
			$output ="";
			while($row = mysql_fetch_array($rs, MYSQL_ASSOC)){
				if($row['seen'] == 1){
					$output .= "<h3 id=\"watched\" class=\"name\">$row[name]</h3>";
				}else{
					$output .= "<h3 id=\"notwatched\" class=\"name\">$row[name]</h3>";
				}
				
				$output .="<div id=\"theMovie\">
							<p class=\"tools\"><a id=\"delete\" href=\"delete.php?id=$row[id] \"><img src=\"cancel.png\" /></a>
							<a id=\"seen\" href=\"seen.php?id=$row[id] \"><img src=\"seen.png\" /></a>
							<a id=\"delete\" target=\"_blank\" href=\"http://filelist.ro/browse.php?search=$row[name]&cat=0 \"><img src=\"search.png\" /></a>
							</p>
							<p class=\"descr\"><b>Plot</b>: $row[description]<br /><b>IMBD Link: </b>  <a href=\"http://www.imdb.com/find?s=all&q=$row[name]&x=0&y=0\" target=\"_blank\" align=\"right\">[Click]</a></small></p>
							</div>";
				
			}
			
			$num_rows = mysql_num_rows($rs);
			$movieNr = Numword::single($num_rows);
			
		}else{
				$output = "<p id=\"empty\"><img src=\"warning.png\" /> <br />You have <strong>NO</strong> movies in the database.</p>";
		}
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <title><?php print $siteName ?></title>
    
    <script src="../jquery-1.3.2.min.js" type="text/javascript" charset="utf-8"></script>
    
    <script src="codekeeper.js" type="text/javascript" charset="utf-8"></script>
    

	<link rel="stylesheet" href="default.css" type="text/css" media="screen" title="moviedb css" charset="utf-8">

    
    
</head>
<body>
   <div id="logo"><span>Movie Database</span></div>
        <div id="wrapper">
			
			<p clear="both" />
        	<p id="moviesLeft">Movies Left: &nbsp; <?php  if(!empty($movieNr)){echo $movieNr; }else{echo "None";}; ?></p>
        	<div id="movie">
			<?php print $output; ?>
			</div>

			<div id="insert">
				<form method="get" action="insert.php">
					<input class="swap_value" type="text" value="Movie Name" name="name" size="40"><br />
					<!-- <input class="swap_value" type="text" name="link" value="Movie Link" size="40"><br /> -->
					<textarea class="countdown limit_400_" cols="30" rows="3" value="Movie Description" name="description"></textarea><br /><span style="color: #C8C8C8;" class="remaining"></span><br />
					<input type="submit" value="Submit Movie!" name="submit">
				</form>
			</div>
        </div>
</body>
</html>
