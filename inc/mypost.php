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
</head>
<body>

	<div class="container">
		<div class="postc" style="margin-bottom: 10px">
			<h2 style="font-family: arial" >My Post(s)</h2>
			<div class="table table-responsive">
			<table id="tab" style="color: #fff" class="table table-bordered">
				<tr>
					<th>Topic</th>
					<th>Content</th>
				</tr>
			<?php  
				$mypost = $_SESSION['reg_id'];
				$sql = "SELECT topic, content FROM navpost WHERE reg_id = '$mypost'";
				$query = mysqli_query($conn, $sql);
				if (mysqli_num_rows($query) > 0) 
				{
					while ($rows = mysqli_fetch_array($query)) 
					{
						echo "<tr><td>" .$rows['topic']."</td><td>". $rows['content']."</td></tr>";
						
					}
				}else{
					echo "<h5 style ='color: #fff; text-align:center'>You don't have topic in the database</h5>";
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