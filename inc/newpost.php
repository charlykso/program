<?php  
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: index.php");
		exit(); 
	}
  include("dbfunction.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Post</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/navstyle.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<style>
		.postc{
			max-width: 300px;
		}
	</style>
</head>
<body>

	<div class="container">
		<div class="postc" style="margin-bottom: 10px">
			<h2 style="font-family: arial" >Write Post</h2>
			<div class="form-group">
				<input type="text" class="title form-control"  placeholder="Title">
			</div>
			<div class="form-group">
				<textarea class="content form-control" placeholder="Content"></textarea>
			</div>
			<a href="nav_post.php"><button class="btn btn-info">Back</button></a>
			<a href="javascript:void(0)" class="btn btn-primary submit">Post</a>
		</div>
	</div>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script>
		function loadwindow(){
			window.location='nav_post.php';
		}
		$(document).ready(function(){
			$('.submit').click(function(){
		var title = $('.title').val();
		var content = $('.content').val();
		$.ajax({
			url: 'save_newpost.php',
			data: 'title=' +title+ '&content=' +content,
			type: 'post',
			success: function(){
				alert('successfully Sent!');
				loadwindow();
			}
		})
	})
		})
	</script>
</body>
</html>