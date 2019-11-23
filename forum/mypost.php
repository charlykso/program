<?php
	
	if(isset($_COOKIE['login']))
	{

	include_once "inc/dbfunction.php";
	//connect();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>My Post</title>
</head>

<body>
<table width="100%" border="1">
  <tr>
    <td colspan="2">
    <a href="home.php">Topics</a> | <a href="mypost.php">My Post</a> | <a href="logout.php"> Logout</a> | <a href="new.php">New Post</a></td>
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
	
	$my_id = $_COOKIE['login'];
	$sql = mysqli_query($conn, "SELECT * FROM comment_topic WHERE topic_by = '$my_id' ") or die(mysqli_error());
	
	if(mysqli_num_rows($sql)> 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
			?>
            
            <p><?= $row['topic'] ?> <a href="post.php?ref=<?=$row['content']?>">View</a> | <a href="delete.php?ref=<?=$row['topic_id']?>">Delete</a></p>
            
            <?php
		}
	}
	
	else
	{
		echo "<h1>You are yet to make a post</h1>";
	}

?>
</body>
</html>

<?php } else {
	$err = base64_encode("Please login to access the forum");
	header("Location:index.php?error=$err")	;
	
}?>