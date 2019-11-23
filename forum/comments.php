<?php
	
	if(isset($_COOKIE['login']))
	{

	include_once "inc/dbfunction.php";
	//connect();
	
	
	if(isset($_POST['button']))
	{
		$topic = $_POST['topic'];
		$cont = $_POST['comments'];
		$user = $_COOKIE['login'];
		$time = date("Y-m-d H:i:s a");
		
		$query = "INSERT INTO comments (topic_id, posted_by, comment, date_posted) VALUES ('$topic', '$user', '$cont', '$time')";
		$sql = mysqli_query($conn, $query)or die (mysqli_error($conn));
		if($sql)
		{
			
			header("Location:post.php?ref=$topic");
		}
		else
		{
			$err = base64_encode("Could not make comment");
			header("Location:post.php?error=$err");
		}
	}
	else
	{
		$err = base64_encode("Please make a post first");
		header("Location:new.php?error=$err")	;
	}
	
	
	
	
	 } else {
	$err = base64_encode("Please login to access the forum");
	header("Location:index.php?error=$err")	;
	
}?>