<?php  
  session_start();
  if(!isset($_SESSION["username"])){
    header("Location: index.php");
    exit(); 
  }
  include("inc/dbfunction.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Optimun Destro | Admin Dashboard</title>
<link rel="stylesheet" type="text/css" href="css/navstyle.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
</head>
<body>
  <div class="container">
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <!--<span class="img-circle img" ><img class="align-right img2" src="<?php //echo $_SESSION['image']; ?>" width="70" height="70px" style="border-radius: 100px; border: 2px solid #fff; margin-left: 50px"></span>-->
      <span class="align-center name"><?php if (isset($_SESSION['other_names'])) {
          echo "<h6 style= 'color: #fff'> Welcome " .$_SESSION['other_names']."</h6>";
        } ?></span>
      <a class="" href="#"><i></i> Home</a>
      <a href="#"><i></i> Search</a>
      <a href="#"><i></i> Contact</a>
      <a href="sslogout.php"><i></i> Logout</a>
    </div>
    <div id="main">
      <div class="header">
        <span id="open" class="op" style="font-size:40px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <h1 class="up">Optimun Destro</h1>
      </div>
      <h2 style="text-align: center; color: #fff">OptimunDestro.com</h2>
      <p style="text-align: center; color: #fff">We offer the best service and make sure you become the best version of yourself.</p>
      <div class="breadcrumb">
        <?php echo 
        "<a id='post1' href='admindash.php?page=mypost&amp;'>My Post</a><t/> | <t/><a id='post2' href='admindash.php?page=newpost&amp;'>New Post</a><t/> | <t/><a id='post2' href='admindash.php?page=view_all_post&amp;'>View All Post</a><t/> | <t/><a id='post3' href='sslogout.php'> Logout </a> | <t/>";
        ?>
        <p style="color: #000; float: right">
        <?php 
          echo "Date: " .gmdate("M-d-Y. ");
          //echo "Time: "; echo date("H:i:s"); 
        if (isset($_GET['succ'])) {
          echo base64_decode($_GET['succ']);
        }elseif (isset($_GET['err'])) {
          echo base64_decode($_GET['err']);
        } 
        ?>
        </p>
      </div>



      <div class="thu col-md-12" style="margin-bottom: 10px">
        <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h2>
        <div class="display col-md-12" style="margin-bottom: 10px">
          <?php 
          error_reporting(0);
          $p = $_GET['page'];

          $page = "inc/" .$p. ".php";

          if (file_exists($page)) {
            include ($page);
          }
        ?>
        </div>
       
      </div>

      <!--footer-->
    <div class="footer_container">
    <div class="container">
      <div class="row">
        <div id="inner" class="col-md-4">
          <h3>SOLD LISTINGS</h3>
          <div id="sold">
            <a href="image/bg4.jpg" target="_blank"><img id="ima1" src="image/bg4.jpg"></a>
            <a href="image/bg5.jpg" target="_blank"><img id="ima1" src="image/bg5.jpg"></a>
            <a href="image/bg6.jpg" target="_blank"><img id="ima1" src="image/bg6.jpg"></a>
            <a href="image/bg7.jpg" target="_blank"><img id="ima1" src="image/bg7.jpg"></a>
          </div>
          <div id="sold">
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
        <p class="right"><a href="#top"><img src="image/arr.png"></a></p>
      </div>
    </div>
    </div>
    </div>      

    </div>




    </div>
  </div>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
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
  /*$('#post2').click(function(){
    $('#post2').AddClass(active);
  })*/
})
</script>
   
</body>
</html> 
