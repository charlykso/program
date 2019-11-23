<?php

	//include "functions.php";
	include_once "inc/dbfunction.php";
	
	//connect();
	
	if(isset($_POST['log']))
	{
		$username = $_POST['username'];
		$pass = $_POST['pass'];
		
		$sql = "SELECT * FROM testing WHERE username = '$username' AND password = '$pass'";	
		$result = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result)>0)
		{
			//login
			$qry = mysqli_fetch_array($result);
			
			
			setcookie('login', $qry['username'], time()+3600, '/');
			header("Location: home.php");
		}
		else
		{
			$err = base64_encode("Username and Password are Wrong");
			header("Location: index.php?error=$err");
		}
		
	}
	else
	{
		$err = base64_encode("Please Login in properly");
		header("Location: index.php?error=$err");
	}