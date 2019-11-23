<?php  
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: index.php");
		exit(); 
	}
  include("dbfunction.php");
  		//$status = "awaiting..";
		if (isset($_REQUEST['submit'])) {
			
			$sql = "DELETE FROM navpost WHERE post_id = {$_REQUEST['post_id']}";
			$query = mysqli_query($conn, $sql);

			if ($query) {
				//echo "<script>confirm('are you sure you want to delete this file?')</script>";
				$del_msg = "Data deleted successfuly";
			}else{
				$del_msg ="Data not deleted";	
			}
		}
		if (isset($_REQUEST['post'])) {
				//$id = $_REQUEST['post_id'];
				$sql = "SELECT * FROM navpost WHERE post_id = {$_REQUEST['post_id']}";
				$query = mysqli_query($conn, $sql);
				while ($rows = mysqli_fetch_array($query)) 
				{
					$post_id1  = $rows['post_id'];
					$topic = $rows['topic'];
					$content = $rows['content'];
					$reg_id = $rows['reg_id'];
					$_SESSION['topic'] = $rows['topic'];
					$_SESSION['reg_id'] = $rows['reg_id'];
				}
				//checking if post has been iserted befor
				$sql5 = "SELECT * FROM nav_main_post WHERE topic = '$topic' LIMIT 1";
				$result1 = mysqli_query($conn, $sql5);

				$num = mysqli_num_rows($result1);
				if ($num == 1) {
					$post_msg = "Post already exist";
				}else{

					$sql2 = "INSERT INTO nav_main_post(post_id, reg_id, topic, content) VALUES('$post_id1', '$reg_id', '$topic', '$content')";
					$query2 = mysqli_query($conn, $sql2);

					if ($query2) {
						if ($post_id1 == $_REQUEST['post_id']) {
							$post_msg = "posted successfuly";						
						}else{
							//$status = "awaiting";
							$post_msg = "not posted 2";
						}
						
					}else{
						//$status = "awaiting";
						$post_msg = "not posted";
					}
				}
		}	      
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>New Post</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/navstyle.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<style>

	</style>
</head>
<body>

	<div class="container">
		<div class="postc" style="margin-bottom: 10px">
			<h2 style="font-family: arial" >All Post(s)</h2>
			
			<div class="table-responsive">	
			<table id="tab" style="color: #fff" class="table table-bordered">
				<tr>
					<th width="10%">Reg-ID</th>
					<th width="30%">Topic</th>
					<th width="45%">Content</th>
					<th width="15%" colspan="2">Action</th>
				</tr>
			<?php  
				$sql = "SELECT * FROM navpost";
				$query = mysqli_query($conn, $sql);
				if (mysqli_num_rows($query) > 0) 
				{
					while ($rows = mysqli_fetch_array($query)) 
					{
						
						echo "<tr>";
						echo "<td>" .$rows['reg_id']."</td>";
						echo "<td>" .$rows['topic']."</td>";
						echo "<td>". $rows['content']."</td>";
						echo "<td><form action='' method='post'><input type='hidden' name='post_id' value=". $rows['post_id'] ."><input type='submit' class='btn btn-danger btn-sm' name='submit' value='Delete'></form></td>";
						echo "<td><form action='' method='post'><input type='hidden' name='post_id' value=". $rows['post_id'] . "><input type='submit' class='btn btn-success btn-sm post' name='post' value='Post'></form></td>"; 
						echo "</tr>";
						
					}
				}else{
					echo "<h5 style ='color: #fff; text-align:center'>You don't have any post in the database</h5>";
				}
			?>	
			</table>
				<?php if (isset($del_msg)) {
					echo "<p style='color: red'>".$del_msg."</p>";
				} elseif (isset($post_msg)) {
					echo "<p style='color: red'>".$post_msg."</p>";
				}?>
			
			</div>
		
		</div>
		<?php  



		?>
	</div>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script>
		$(document).ready(function(){
			/*$('.post').click(function(){
				var post_id = $('#p').val();
				$.ajax({
					url: 'view_allpro.php',
					data: 'post_id=' +post_id,
					type: 'post',
					success: function(){
						alert('successfully Sent!');
					}
				})
			})*/

		})
	</script>
</body>
</html>