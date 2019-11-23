<?php
	
	if(isset($_COOKIE['login']))
	{

	include_once "functions.php";
	//connect();
	include_once "inc/dbfunction.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
</head>

<body>
<table width="100%" border="1">
  <tr>
    <td colspan="2">
    <a href="home.php">Topics</a> | <a href="mypost.php">My Post</a> | <a href="logout.php"> Logout</a> | <a href="new.php">New Post</a> | <a href="password.php">Change Password</a></td>
  </tr>

</table>
<?php if(isset($_GET['success'])) { 
	   $err = base64_decode($_GET['success']);
 ?>
	<table>
    <tr>
      <td colspan="2" bgcolor="#0099FF">
      	<h2 style="color:#FFF"><?= $err; ?></h2>
      </td>
     
    </tr>
    </table>
<?php } ?>    
<h1>Available Topics</h1>
<?php
	
	$sql = mysqli_query($conn, "SELECT * FROM comment_topic" ) or die(mysqli_error($conn));
	
	if(mysqli_num_rows($sql)> 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
			?>
            <hr>
            <p><?= $row['topic'] ?> <a href="post.php?ref=<?=$row['id']?>">View</a></p> 
            <p> Posted by: <b><?= $_COOKIE['login']; ?></b> | Time Posted : <?=$row['date_posted']?> |  (<?= commentCount($row['id']) ?>) comments </p>
            <hr>
            <?php
		}
	}
	
	else
	{
		echo "<h1>No Topics in Database Yet</h1>";
	}

?>
</body>
</html>

<?php } else {
	$err = base64_encode("Please login to access the forum");
	header("Location:index.php?error=$err")	;
	
}?>