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
	<title>Comments</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/navstyle.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<style>
		/*.postc{
			max-width: 300px;
		}*/	
	</style>
</head>
<body>

	<div class="container">
		<div class="row" style="width: 100%">
			
			<div class="col-md-8 comment_listen" style="background-color: green">
				
				
				
			</div>
			<div class="col-md-4" style="">
				<h3 style="font-family: arial; text-align: center; color: #fff" >Write Comment</h3>
				<div class="form-group" style="width: 280px;">
					<textarea class="comment form-control" placeholder="Comment" rows="10"></textarea>
				</div>
				<div class="form-group">
					<a href="comment.php"><button class="btn btn-info">Back</button></a>
					<a href="javascript:void(0)" class="btn btn-primary submit">Post</a>
				</div>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script>
		function listComments()
		{
			$.ajax({
				url: 'nav_list_comment.php',
				success: function(res){
					$('.comment_listen').html(res);
				}
			})
		}
	$(document).ready(function(){
		listComments();
		setInterval(function(){
			listComments();
		},10000);
		$('.submit').click(function(){
			var comment = $('.comment').val();
			$.ajax({
				url: 'nav_save_comment.php',
				data: 'comment=' +comment,
				type: 'post',
				success: function(){
					alert('Your Comment has been posted successfully!');
					listComments();	
				}
			})
		})

		$('.comment').focus(function(){
			$(this).css({background:'#000', color:'#fff'});
		})
		$('.comment').blur(function(){
			$(this).css({background:'#fff', color:'#000'});
		})
		
	})
</script>
</body>
</html>