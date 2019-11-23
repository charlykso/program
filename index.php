<?php  
  include 'inc/dbfunction.php';

  if(isset($_POST['submit']))
{
$last_name = $_POST['last_name'];
$other_names = $_POST['other_names'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];


$err_msg = false;
if (!($password === $confirm_password)) 
{
  $err_msg = true;
  $pass_err = "Passwords didn't match... Try again.";
}
else 
{
  $password = $password;
}
if (empty($_FILES['image']['name'])) 
{
  $err_msg = true;
  $img_err = "You must upload your picture";
} 
else 
{
$img_dir = "profile_pic/";
$img_new_path = $img_dir . basename($_FILES['image']['name']);
$img_tmp_path = $_FILES['image']['tmp_name'];
$move = move_uploaded_file($img_tmp_path, $img_new_path);
}

if ($err_msg === false) 
{
  
$sql = "INSERT INTO navregister (last_name, other_names, gender,
    email, phone, username, password, profile_pix) VALUES ('$last_name', 
    '$other_names', '$gender', '$email', '$phone', '$username', '$password', '$img_new_path')";

$query = mysqli_query($conn, $sql);

if ($query) 
{
  $succ = "Registeration successful.";
  header('location: index.php?succ=' .$succ);
} 
else 
{
  $err = "Error submitting user details.";
  header('location: index.php?err='.$err);
}


}
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Optimun Destro | Home</title>
<link rel="stylesheet" type="text/css" href="css/navstyle.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!--<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">-->
</head>
<body>
  <div class="container" id="top">
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a class="active" href="#"><i></i> Home</a>
      <a href="#"><i></i> Search</a>
      <a href="#"><i></i> Contact</a>
      <a href="#" data-toggle="modal" data-target="#addData"><i></i> Login</a>
      <a href="#" data-toggle="modal" data-target="#addData1"><i></i> Register</a>
    </div>
    <!--login Modal-->
    <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="addLabel">LogIn</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            
          </div>
          <!--Modal Body-->
          <form method="post" action="login_process.php">
            <div class="modal-body">
              <div class="form-group">
                <label for="fn">Username</label>
                <input type="text" class="form-control" id="un" name="username" placeholder="Enter Username" required="">
              </div>
              <div class="form-group">
                <label for="ad">Password</label>
                <input type="password" class="form-control" id="pa" name="password" placeholder="Enter Password" required="">
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-default" type="button" data-dismiss="modal">close</button>
              <button class="btn btn-primary" onclick="saveData()" name="submit" type="submit">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
          <!--register modal-->
      <div class="modal fade" id="addData1" tabindex="-1" role="dialog" aria-labelledby="addLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="addLabel">Register</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
        </div>
        <form method="post" action="index.php" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="fn">Last Name</label>
              <input type="text" class="form-control" id="fn" name="last_name" placeholder="Enter Last Name" required="">
            </div>
            <div class="form-group">
              <label for="on">Other Names</label>
              <input type="text" class="form-control" id="fn" name="other_names" placeholder="Enter Other Names" required="">
            </div>
            <div class="form-group">
              <label for="gen">Gender</label>
              <select name="gender" class="form-control">
                <option value="">Select Gender</option>
                <option value="Female">Female</option>
                <option value="Male">Male</option>
                <option value="Others">Others</option>
              </select>
            </div>
            <div class="form-group">
              <label for="em">Email</label>
              <input type="email" class="form-control" id="em" name="email" placeholder="Enter Email" required="">
            </div>
            <div class="form-group">
              <label for="ph">Phone No</label>
              <input type="phone" class="form-control" id="ph" name="phone" placeholder="Enter phone no" required="" >
            </div>
            <div class="form-group">
              <label for="un">Username</label>
              <input type="text" class="form-control" id="unam" name="username" placeholder="Enter Username" required="">
            </div>
            <div class="form-group">
              <label for="pa">Password</label>
              <input type="password" class="form-control" id="pass" name="password" placeholder="Enter Password" required=""><span id="error" class="help-block"><?php if (isset($pass_err)) { echo $pass_err; exit(); } ?></span>
            </div>
            <div class="form-group">
              <label for="cp">Confirm Password</label>
              <input type="password" class="form-control" id="cpass" name="confirm_password" placeholder="Confirm Password" required=""><span id="error" class="help-block"><?php if (isset($pass_err)) { echo $pass_err; exit(); } ?></span>
            </div>
            <div class="form-group">
              <label for="pic">Picture</label>
              <input type="file" class="form-control" id="img" name="image"><span id="error" class="help-block"><?php if (isset($img_err)) { echo $img_err; exit(); } ?></span>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-default" type="button" data-dismiss="modal">close</button>
            <button class="btn btn-primary" onclick="saveData()" name="submit" type="submit">Sign Up</button>
          </div>
        </form>
      </div>
    </div>
  </div>

    <div id="main">
      <div class="header">
        <table class="countDownContainer">
          <tr class="info">
            <td colspan="4">2025 CountDown</td>
          </tr>
          <tr class="info">
            <td id="days"></td>
            <td id="hours"></td>
            <td id="minutes"></td>
            <td id="seconds"></td>
          </tr>
          <tr>
            <td>Days</td>
            <td>Hrs</td>
            <td>Mins</td>
            <td>Secs</td>
          </tr>
        </table>
        <span id="open" class="op" style="font-size:40px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <h1 class="up">Optimun Destro</h1>
        <p class="upp">$Impossible = i_am_possible......</p>
        <?php if (isset($_GET['succ'])) { echo $_GET['succ'];}elseif (isset($_GET['err'])) {
          echo $_GET['err'];
        } ?>
      </div>
      <h2 style="text-align: center; color: #fff">OptimunDestro.com</h2>
      <p style="text-align: center; color: #fff">We offer the best service and make sure you become the best version of yourself.</p>
      <div class="slider">
        <img class="slide" src="image/1.jpg" width="100%">
        <img class="slide" src="image/2.jpg" width="100%">
        <img class="slide" src="image/3.jpg" width="100%">
        <img class="slide" src="image/4.jpg" width="100%">
      </div>
      <div class="loader">
        <img src="image/ajax-loader4.gif">
      </div>
      <div class="thu col-md-12">
        <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>

      <!--footer-->
    <div class="footer_container">
    <div class="container">
      <div class="row">
        <div id="inner" class="col-md-4">
          <h3>SOLD LISTINGS</h3>
          <div id="sold" class="sell" >
            <a href="image/bg4.jpg" target="_blank"><img id="ima1" src="image/bg4.jpg"></a>
            <a href="image/bg5.jpg" target="_blank"><img id="ima1" src="image/bg5.jpg"></a>
            <a href="image/bg6.jpg" target="_blank"><img id="ima1" src="image/bg6.jpg"></a>
            <a href="image/bg7.jpg" target="_blank"><img id="ima1" src="image/bg7.jpg"></a>
          </div>
          <div id="sold" class="sell">
            <a href="image/bg9.jpg" target="_blank"><img id="ima1" src="image/bg9.jpg"></a>
            <a href="image/bg11.jpg" target="_blank"><img id="ima1" src="image/bg11.jpg"></a>
            <a href="image/bg12.jpg" target="_blank"><img id="ima1" src="image/bg12.jpg"></a>
            <a href="image/bg13.jpg" target="_blank"><img id="ima1" src="image/bg13.jpg"></a>
          </div>
        </div>
        <div id="inner" class="col-md-4">
          <h3>FIND US HERE</h3>
          <a href="http://twitter.com"><img id="inner2" src="image/twitter.png"> twitter/charlykso</a><br>
          <hr/>
          <a href="http://facebook.com"><img id="inner2" src="image/facebook.jpg"> facebook/charlykso</a><br>
          <hr/>
          <a href="http://instagram.com"><img id="inner2" src="image/instagram.png"> instagram/charlykso</a><br>
          <hr/>
          <a href="http://gmail.com"><img id="inner2" src="image/gpluse.png"> charlykso141@gmail.com</a><br>
          <hr/>
          <a href="http://rss.com"><img id="inner2" src="image/rss.png"> rss/charlykso</a><br>
          
        </div>
        <div id="inner" class="col-md-4">
          <h3>OTHER TEXT HERE</h3>
          <p id="inner_p" class="justify">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Ut enim.Ut enim ad minim veniam,quis nostrud exercitation.Ut enim ad minim veniam,
          qui.
          </p>
        </div>
      <div class="last_footer">
        <p id="away" >Tel: +234-706-268-2820 | Fax: 1-800-365-8954</p>
        <p >Copyright &copy, All right reserved. icon by: Programmer</p>
        <!--<p class="right"><a href="#top"><img src="image/arr.png"></a></p>-->
      </div>
    </div>
    </div>
    </div>      

    </div>

  </div>
  

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script3.js"></script>
<script>
  $(window).on("load", function(){
    $(".loader").delay(2000).fadeOut();
  });
function openNav() {
  document.getElementById("mySidenav").style.width = "220px";
  document.getElementById("main").style.marginLeft = "120px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
$(document).ready(function(){
  $('.op').click(function(){
    $("#sold #ima1").css({width:'68px', height:'140px'});
  })
  $('.closebtn').click(function(){
    $("#sold #ima1").css({width:'79px', height:'140px'});
  })
})

  var myIndex = 0;
  carousel();
  function carousel()
    {
      
      var x = document.getElementsByClassName("slide");
      for (var i = 0; i < x.length; i++) {
      x[i].style.display = "none";
      }
      myIndex++
      if (myIndex > x.length) {myIndex=1}
        x[myIndex-1].style.display = "block";
      setTimeout(carousel, 3000);
    }
</script>
   
</body>
</html> 
