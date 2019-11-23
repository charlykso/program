<?php
include "inc/dbfunction.php";
/*function connect()
{
	$server = "localhost";
	$dataBase = "funai";
	$username = "root";
	$password = "";
	
	$con = mysql_connect($server, $username, $password) or die(mysql_error());
	mysql_select_db($dataBase, $con) or die(mysql_error());
}*/
function getUserName($id)
{
	include "inc/dbfunction.php";
		
		$sql = mysqli_query($conn, "SELECT * FROM testing WHERE id = '$id'") or die (mysqli_error($conn));
		$row = mysqli_fetch_array($sql);
		
		return $row['name'];		
}
function commentCount($id)
{
	include "inc/dbfunction.php";
	$sql = mysqli_query($conn, "SELECT * FROM comments WHERE topic_id = '$id'") or die (mysqli_error($conn));
	//$row = mysql_fetch_array($sql);
		
		return mysqli_num_rows($sql);
}