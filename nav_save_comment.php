<?php  
	session_start();
	include 'inc/dbfunction.php';
	if (empty($_POST['comment'])) {
		exit();
	}else{
	$reg_id = $_SESSION['reg_id'];
	$topic = $_SESSION['topic'];
	$image = $_SESSION['image'];
	$other_names = $_SESSION['other_names'];
	$comment = mysqli_real_escape_string($conn,$_POST['comment']);
	$comment_date = date('Y-m-d H:i:s a');

	$sql = "INSERT INTO nav_comment (reg_id, other_names, topic, comment, image, comment_date) VALUES('".$reg_id."', '".$other_names."', '".$topic."', '".$comment."', '".$image."', '".$comment_date."')";
	mysqli_query($conn, $sql);
	}
	mysqli_close($conn);
?>