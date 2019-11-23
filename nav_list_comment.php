<?php  
	session_start();
	include 'inc/dbfunction.php';
	$sql = "SELECT * FROM nav_comment ORDER BY com_id DESC LIMIT 3";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result)>0) 
	{
		while ($row = mysqli_fetch_object($result)) {
			?>
			<div class="container" >
				<div class="row">
					<span class="img" ><img class="align-right img2" src="<?php echo $row->image; ?>" width="50" height="50px" style="border-radius: 100px; border: 2px solid #fff; margin-left: 50px"></span>
					<div class="col-md-4"><b style="color: #fff" ><?php echo $row->other_names; ?></b></div>
					<div class="col-md-8"><b style="color: #fff">Topic: <i><?php echo $row->topic; ?>....</i></b></div>
					<div class="col-md-8"><i style="color: #fff"><?php echo $row->comment; ?></i></div>
					<div class="col-md-4"><i style="color: #fff"><?php echo $row->comment_date; ?></i></div>
					<div class="col-md-12"><hr style="border: 2px solid"></div>
					<!--<p>&nbsp;</p>-->
				</div>
			</div>
			<?php
		}
	}
	mysqli_close($conn);
?>