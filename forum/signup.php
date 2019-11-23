<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Sign Up</title>
</head>

<body>
<form name="form1" method="post" action="">
  <table width="100%" border="1">
    <tr>
      <td width="38%">Name</td>
      <td width="62%"><label for="name"></label>
      <input type="text" name="name" id="name"></td>
    </tr>
    <tr>
      <td>Username</td>
      <td><label for="username"></label>
      <input type="text" name="username" id="username"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="password"></label>
      <input type="password" name="password" id="password"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="signup" id="button" value="Submit"></td>
    </tr>
  </table>
</form>

<?php

	include "functions.php";
	include_once "inc/dbfunction.php";
	
	//connect();
	
	if(isset($_POST['signup']))
	{
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if($name !='' && $username !='' && $password !='')
		{
			$sql = "INSERT INTO testing (name, username, password) VALUES('$name', '$username', '$password')";
			/*$sql = mysqli_query("INSERT INTO profile SET
														name='$name',
														email_add='$username',
														password = '$password'	") or die(mysqli_error());*/
			$result = mysqli_query($conn, $sql);											
			if($result)
			{
					//login
					$id = mysqli_insert_id();
				$qry = mysqli_fetch_array($result);
					
				setcookie('login', $id, time()+3600, '/');
				header("Location: index.php");	
			}
			/*else
			{
				header("Location: home.php");
			}*/
		}
	}


?>
</body>
</html>