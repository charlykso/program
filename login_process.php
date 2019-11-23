<?php  
	session_start();
	include 'inc/dbfunction.php';


	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    	header("location: index.php");
    	exit;
    }
    	$admin = "admin";
    	$adminpass = "admin123";
    	if($_SERVER["REQUEST_METHOD"] == "POST"){

    		if(empty(trim($_POST["username"]))){
        		$uerr_msg = "Please enter username.";
    		} else{
        		$username = trim($_POST["username"]);
   			}
   			if(empty(trim($_POST["password"]))){
        		$perr_msg = "Please enter username.";
    		} else{
        		$password = trim($_POST["password"]);
   			}



   			if (empty($uerr_msg) && empty($perr_msg)) 
		    {
		    	
		    	$sql = "SELECT * FROM navregister WHERE username = '$username' AND password = '$password' LIMIT 1";

		    	$result = mysqli_query($conn, $sql);

				$num = mysqli_num_rows($result);

				if ($username == $admin && $password == $adminpass) {
					$_SESSION["username"] = "Admin001";
					$succ = base64_encode("Welcome Admin");
					header('location: admindash.php?succ=' .$succ);
				}

				elseif ($num == 1) {

					$sql2 = "SELECT * FROM navregister";
					$result2 = mysqli_query($conn, $sql2);
					
					if (mysqli_num_rows($result2) > 0) 
					{
									
						while ($rows = mysqli_fetch_assoc($result)) 
						{
							$_SESSION["loggedin"] = true;
							$_SESSION['other_names'] = $rows['other_names'];
							$_SESSION['username'] = $rows['username'];
							$_SESSION['reg_id'] = $rows['reg_id'];
							$_SESSION['image'] = $rows['profile_pix'];	
					
						}
						$succ = base64_encode("Login Successful");
						header('location: nav_post.php?succ=' .$succ);
						
					}else{
						$err = base64_encode("Login failed");
						header('location: nav_post.php?err=' .$err);	
					}
							
				}
				else{
						$err = "Please Register first before you Login";
						header('location: index.php?err=' .$err);
					}
				
		    }
    	}
	
mysqli_close($conn);
?>
<?php //if(isset($_GET['error'])) { 
	   //$err = base64_decode($_GET['error']);
 ?>
 <?php //if(isset($_GET['success'])) { 
	  // $err = base64_decode($_GET['success']);
 ?>