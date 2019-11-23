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
<title>New Post</title>
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td colspan="2">
    <a href="home.php">Topics</a> | <a href="mypost.php">My Post</a> | <a href="logout.php"> Logout</a> | <a href="new.php">New Post</a></td>
  </tr>

</table>
<?php if(isset($_GET['error'])) { 
	   $err = base64_decode($_GET['error']);
 ?>
	
    <tr>
      <td colspan="2" bgcolor="#FF0000">
      	<h2 style="color:#FFF"><?= $err; ?></h2>
      </td>
     
    </tr>
<?php } ?>    
<h1>Make New Topic</h1>
<form name="form1" method="post" action="script.php">
  <table width="100%" border="0">
    <tr>
      <td width="10%">Title</td>
      <td width="90%"><label for="title"></label>
      <input type="text" name="title" id="title"></td>
    </tr>
    <tr>
      <td><p>Content</p></td>
      <td><label for="content"></label>
      <textarea name="content" id="content" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="reset" name="button2" id="button2" value="Reset">        
      <input type="submit" name="button" id="button" value="Submit"></td>
    </tr>
  </table>
</form>

  <input ref="q"><label>Find</label></input>
  <submit submission="s"><label>Go</label></submit>
 </h:p>
</h:body>
</h:html>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>

<?php } else {
	$err = base64_encode("Please login to access the forum");
	header("Location:index.php?error=$err")	;
	
}?>