<?php  
 include("inc/dbfunction.php");


	$sql ="SELECT navregister.last_name, navregister.other_names, nav_main_post.topic, nav_main_post.content FROM nav_main_post JOIN navregister ON nav_main_post.reg_id = navregister.reg_id";
				$query = mysqli_query($conn, $sql);
				while ($rows = mysqli_fetch_array($query)) 
					{
						echo $rows['other_names'].' '.$rows['last_name'];
						echo "<br>";

						/*echo "<table>";
						echo "<tr>"
							"<td>" .$rows['other_names']. " " .$rows['firstname']."</td>"
							"<td>". $rows['content']."</td>"
							"<td>". $rows['content']."</td>"

						echo "</tr>";
						echo "</table>";*/
						
					}
?>
<table id="tab" style="color: #fff" class="table table-bordered">
				<tr>
					<th>Posted By</th>
					<th>Topic</th>
					<th>Content</th>
				</tr>
			<?php  
				$sql = "SELECT navregister.last_name, navregister.other_names, nav_main_post.topic, nav_main_post.content FROM nav_main_post JOIN navregister ON nav_main_post.reg_id = navregister.reg_id";
				$query = mysqli_query($conn, $sql);
					while ($rows = mysqli_fetch_array($query)) 
					{
						echo "<tr><td>" .$rows['last_name']. " " .$rows['other_names']."</td>";
						echo "<td>". $rows['topic']."</td>";
						echo	"<td>". $rows['content']."</td>";

						echo "</tr>";
						
					}
				
			?>
				
			</table>