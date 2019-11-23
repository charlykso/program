<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Index</title>
</head>

<body>
<form name="form1" method="post" action="login.php">

  <table width="100%" border="0">
<?php if(isset($_GET['error'])) { 
	   $err = base64_decode($_GET['error']);
 ?>
	
    <tr>
      <td colspan="2" bgcolor="#FF0000">
      	<h2 style="color:#FFF"><?= $err; ?></h2>
      </td>
     
    </tr>
<?php } ?>    
    <tr>
      <td>Username</td>
      <td><label for="username"></label>
      <input type="text" name="username" id="username"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="pass"></label>
      <input type="password" name="pass" id="pass"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="log" id="log" value="Login"> 
      <a href="signup.php">signup</a></td>
    </tr>
  </table>
</form>
</body>
</html>