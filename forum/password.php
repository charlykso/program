<?php

if(isset($_COOKIE['login']))
	{
		include "functions.php";
		
		connect();
		?>
		
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
 if(isset($_GET['error'])) { 
	   $err = base64_decode($_GET['error']);
 ?>
	<table>
    <tr>
      <td  bgcolor="#FF0000">
      	<h2 style="color:#FFF; padding:10px;"><?= $err; ?></h2>
      </td>
     
    </tr>
    </table>
<?php } ?>    

<form name="form1" method="post" action="">
  <table width="100%" border="1">
    <tr>
      <td>Old Password</td>
      <td><label for="opassword"></label>
      <input type="text" name="opassword" id="opassword"></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><input type="text" name="npassword" id="npassword"></td>
    </tr>
    <tr>
      <td>Confirm New Password</td>
      <td><input type="text" name="cpassword" id="cpassword"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="change_p" id="button" value="Submit"></td>
    </tr>
  </table>
</form>

<?php
	if(isset($_POST['change_p']))
	{
		$my_id =$_COOKIE['login'];
		$op = mysql_real_escape_string(trim($_POST['opassword']));
		$np = mysql_real_escape_string(trim($_POST['npassword']));
		$cp = mysql_real_escape_string(trim($_POST['cpassword']));
		
		$i = mysql_query ("SELECT * FROM profile WHERE user_Id = '$my_id' ") or die (mysql_error());
		
		$res = mysql_fetch_array($i);
		
		$oldPass = $res['password'];
		
		if($op == $oldPass)
		{
			if($np == $cp)
			{
				
				$sql = mysql_query("UPDATE profile SET
														password = '$cp' 
														
													
													WHERE user_Id = '$my_id'") or die(mysql_error());
				
				if($sql)
				{
					$err = base64_encode("Password Change Successful");
					header("Location:password.php?error=$err")	;
				}
				
			}
			else
			{
				$err = base64_encode("New password not matching confirm password");
				header("Location:password.php?error=$err")	;
			}
		}
		else
		{
			$err = base64_encode("Old password doesnt match");
			header("Location:password.php?error=$err")	;
		}
	}
	

?>
</body>
</html>



<?php }
else
	{
		$err = base64_encode("Please login to access the forum");
		header("Location:index.php?error=$err")	;
	
	}


 ?> 

