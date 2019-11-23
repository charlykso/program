<?php
	if(isset($_COOKIE['login']))
	{
		include "functions.php";
		
		connect();
		
		
		if(isset($_GET['ref']))
		{
			$ref = $_GET['ref'];
			$my_id = $_COOKIE['login'];
			
			$sql = mysql_query("SELECT * FROM topic WHERE topic_id = '$ref' AND topic_by = '$my_id' ") or die(mysql_error());
			
			if(mysql_num_rows($sql) > 0)
			{
				$del = mysql_query("DELETE FROM topic WHERE topic_id = '$ref'") or die (mysql_error());
				$del_com = mysql_query("DELETE FROM comments WHERE topic_id = '$ref'") or die (mysql_error());
				
					//$err = base64_encode("Please login to access the forum");
				header("Location:mypost.php");
			}
			else
			{
				echo "You cant delete a post you didnt create";
				echo "<br> <a href='mypost.php?ref=".$ref."'>click here</a> to go back";
			}
	
			
			
		}
	}
	else
	{
		$err = base64_encode("Please login to access the forum");
		header("Location:index.php?error=$err")	;
	
	}

