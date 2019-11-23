<?php  
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: index.php");
		exit(); 
	}
  include("dbfunction.php");


  if (isset($_POST['comment'])) {
				$sql = "SELECT * FROM navpost WHERE post_id = {$_REQUEST['post_id']}";
				$query = mysqli_query($conn, $sql);

				while ($rows = mysqli_fetch_array($query)) 
				{
					$_SESSION['post_id'] = $rows['post_id'];
					$_SESSION['topic'] = $rows['topic'];
					$_SESSION['content'] = $rows['content'];
					$_SESSION['last_name'] = $rows['last_name'];

					$topic_ses = $_SESSION['topic'];
					$content_ses = $_SESSION['content'];

					header('location: comment.php');
				}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Topics</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/navstyle.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div class="postc" style="margin-bottom: 10px">
			<h2 style="font-family: arial" >Topics Available</h2>
			<div class="table table-responsive">
			<table id="tab" style="color: #fff" class="table table-bordered">
				<tr>
					<th>Posted By</th>
					<th>Topic</th>
					<th>Content</th>
					<th>Post_Id</th>
					<th>Comment</th>
				</tr>
			<?php  
				$sql = "SELECT navregister.last_name, navregister.other_names, nav_main_post.topic, nav_main_post.content, nav_main_post.post_id FROM nav_main_post JOIN navregister ON nav_main_post.reg_id = navregister.reg_id";
				$query = mysqli_query($conn, $sql);
					while ($rows = mysqli_fetch_array($query)) 
					{
						echo "<tr><td>" .$rows['last_name']. " " .$rows['other_names']."</td>";
						echo "<td>". $rows['topic']."</td>";
						echo "<td>". $rows['content']."</td>";
						echo "<td>". $rows['post_id']."</td>";
						echo "<td><form action='' method='post'><input type='hidden' name='post_id' value = ".$rows['post_id']."><input type='submit' name='comment' class='btn btn-info' value ='View Comment'></form></td>";

						echo "</tr>";
						
					}
				
			?>
				
			</table>
		</div>
		</div>
	</div>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script>
		$(document).ready(function(){

		})
	</script>
</body>
</html>