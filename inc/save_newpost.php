<?php  
	session_start();

  include("dbfunction.php");

  	$reg_id = $_SESSION['reg_id'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$post_date = date('Y-m-d H:i:s');

	$sql = "INSERT INTO navpost (reg_id, title, content, post_date) VALUES('".$reg_id."', '".$title."', '".$content."', '".$post_date."')";
	$query = mysqli_query($conn, $sql);

	if ($query) {
		header('location: nav_post.php')
	}
?>