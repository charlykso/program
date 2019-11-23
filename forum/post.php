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
<title>Post</title>
</head>

<body>
<table width="100%" border="1">
  <tr>
    <td colspan="2">
    <a href="home.php">Topics</a> | <a href="mypost.php">My Post</a> | <a href="logout.php"> Logout</a> | <a href="new.php">New Post</a></td>
  </tr>

</table>
<?php 

		$topic = $_GET['ref'];
		
		$sql = mysqli_query($conn, "SELECT * FROM comment_topic WHERE topic = '$topic'") or die (mysqli_error());
		$row = mysqli_fetch_array($sql);
		
 ?>
	
<h1><?=$row['topic']?></h1>
<p><?= $row['content'] ?></p>



<p>&nbsp;</p>
<form name="form1" method="post" action="comments.php">
  <table width="100%" border="0">
    <tr>
      <td><label for="textarea"></label>
      <textarea name="comments" id="textarea" cols="45" rows="5"></textarea>
      <input type="hidden" name="topic" value="<?=$topic?>">
      </td>
    </tr>
    <tr>
      <td><input type="submit" name="button" id="button" value="Submit"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<h3>Comments</h3>
<table border='1'>

<?php 

		$topic = $_GET['ref'];
		
		$qry = mysqli_query($conn, "SELECT * FROM comments WHERE topic_id = '$topic'") or die (mysql_error());
		while($res = mysqli_fetch_array($qry))
		{
			?>
            
            	<tr>
           		  <td>	Comment by <br>

                        		<?= $_COOKIE['login'];?>
                                <br>
								<?= $res['date_posted']; ?>
                  </td>
                  <td>
                        		<?= $res['comment'] ?>
                  </td>
                </tr>
            	
            
  <?php
			
		}
		
 ?>
</table>
</body>
</html>

<?php } else {
	$err = base64_encode("Please login to access the forum");
	header("Location:index.php?error=$err")	;
	
}?>