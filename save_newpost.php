<?php  
	session_start();

  include("inc/dbfunction.php");
  if (empty($_POST['title']) || empty($_POST['content'])) {
  	header('location: nav_post.php');
  	exit();
  }else{
  	$reg_id = $_SESSION['reg_id'];
	$topic = $_POST['title'];
	$content = $_POST['content'];
	$post_date = date('Y-m-d H:i:s');

	$sql = "INSERT INTO navpost(reg_id, topic, content, post_date) VALUES('$reg_id', '$topic', '$content', '$post_date')";
	$query = mysqli_query($conn, $sql);

	if ($query) {
		header('location: nav_post.php');
	}else{
		$err = base64_encode("Not sent");
		header('location: nav_post.php?error=$err');
	}
	}
	mysqli_close($conn);
?>