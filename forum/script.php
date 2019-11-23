<?php
	
	if(isset($_COOKIE['login']))
	{

	include_once "inc/dbfunction.php";
	//connect();

	
	
	if(isset($_POST['button']))
	{
		$title = mysqli_real_escape_string($conn, trim( $_POST['title']));
		$cont = mysqli_real_escape_string($conn, trim( $_POST['content']));
		$user = $_COOKIE['login'];
		$time = date("Y-m-d H:i:s a");
		
		$query = "INSERT INTO comment_topic (topic, content, topic_by, date_posted) VALUES('$title', '$cont', '$user', '$time')";
		$sql = mysqli_query($conn, $query)or die (mysqli_error());

		if($sql)
		{
			//echo "<script>alert('data inserted')</script>";
			$success = base64_encode("Topic Added");
			header("Location:home.php?success=$success");
		}
		else
		{
			$err = base64_encode("Could not make post");
			header("Location:new.php?error=$err");
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