<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['signup']))
  {
    $fname=$_POST['fname'];
    $mobno=$_POST['mobno'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $ret="select Email from tbluser where Email=:email";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$sql="Insert Into tbluser(FullName,MobileNumber,Email,Password)Values(:fname,:mobno,:email,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobno',$mobno,PDO::PARAM_INT);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo "<script>alert('You have signup  Scuccessfully');</script>";
}
else
{

echo "<script>alert('Something went wrong.Please try again');</script>";
}
}
 else
{

echo "<script>alert('Email-id already exist. Please try again');</script>";
}
}
if(isset($_POST['login'])) 
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql ="SELECT ID FROM tbluser WHERE Email=:email and Password=:password";
    $query=$dbh->prepare($sql);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['ispmsuid']=$result->ID;
}
$_SESSION['login']=$_POST['email'];
echo "<script type='text/javascript'> document.location ='index.php'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
}
}

?>
<div class="header">
        <div class="container-fluid">
            <div class="header-grid">
                <div class="header-grid-left">
                    <ul><?php
$sql="SELECT * from tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                        <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="index.php"><?php  echo htmlentities($row->Email);?></a></li>
                        <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+<?php  echo htmlentities($row->MobileNumber);?></li><?php $cnt=$cnt+1;}} ?>
                        <?php if (strlen($_SESSION['ispmsuid']==0)) {?>
                        <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="#" class="login" data-toggle="modal" data-target="#myModal4">Login</a></li>
                        <li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="#" class="login reg"  data-toggle="modal" data-target="#myModal5">Register</a></li><?php } ?>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="logo-nav">
                <div class="logo-nav-left">
                    <h1><a href="index.php">THUNDER SPEED<span>digital networks</span></a></h1>
                </div>
                <div class="logo-nav-left1">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="index.php">Home</a></li>
                                <li class="agileits dropdown"><a href="about.php">About</a></li>
                                <li><a href="bbplan.php">Broadband</a></li>
                                <li><a href="dthplan.php">Digital Cable TV</a></li>
                                <li><a href="contact.php">contact us</a></li>
                                <?php if (strlen($_SESSION['ispmsuid']!=0)) {?>
                                <li class="agileits dropdown">
                                    <a href="#" data-toggle="dropdown" aria-expanded="true">My Account</a>
                                    <ul class="dropdown-menu agile_short_dropdown">
                                        <li><a href="profile.php">Profile</a></li>
                                        <li><a href="change-password.php">Change Password</a></li>
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </li>
                                <li class="agileits dropdown">
                                    <a href="#" data-toggle="dropdown" aria-expanded="true">Request History</a>
                                    <ul class="dropdown-menu agile_short_dropdown">
                                        <li><a href="broadband-request.php">Broadband</a></li>
                                        <li><a href="dth-request.php">Digital Cable TV</a></li>
                                    </ul>
                                </li><?php } ?>
                                  <?php if (strlen($_SESSION['ispmsuid']==0)) {?>
                                <li><a href="admin/login.php">Admin</a></li>
                            <?php } ?>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //header -->
    <div class="general_social_icons">
        <nav class="wthree-social">
            <ul>
                <li class="w3_facebook"><a href="#"> <i class="fa fa-facebook"></i>Facebook</a></li>
                <li class="w3_twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter </a></li>
                <li class="w3_dribbble"><a href="#"> <i class="fa fa-dribbble"></i>Dribbble</a></li>
                <li class="w3_g_plus"><a href="#"><i class="fa fa-google-plus"></i>Google+ </a></li>                  
            </ul>
        </nav>
    </div>
     <!-- Modal1 -->
                    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" >

                            <div class="modal-dialog">
                            <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4>Login</h4>
                                        <div class="login-form">
                                            <form method="post" name="login">
                                                <input type="email" name="email" placeholder="E-mail" required="true">
                                                <input type="password" name="password" placeholder="Password" required="true">
                                                <div class="tp">
                                                    <input type="submit" name="login" value="LOGIN NOW">
                                                </div>
                                                <div class="forgot-grid">
                                                       
                                                        <div class="forgot">
                                                            <a href="forgot-password.php">Forgot Password?</a>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!-- //Modal1 -->
                  <!-- Modal1 -->
                    <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" >

                            <div class="modal-dialog">
                            <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4>Register</h4>
                                        <div class="login-form">
                                            <form method="post" name="signup" onsubmit="return checkpass();">
                                                <input type="text" name="fname" placeholder="Full Name" required="true">
                                                <input type="email" name="email" placeholder="E-mail" required="true">
                                                <input type="text" name="mobno" placeholder="Mobile Number" required="true" maxlength="10" pattern="[0-9]+">
                                                <input type="password" name="password" placeholder="Password" required="true" id="password1">
                                                <input type="password" name="conform password" placeholder="Confirm Password" required="true" id="password2">
                                                <div class="signin-rit">
                                                    <span class="agree-checkbox">
                                                        <label class="checkbox"><input type="checkbox" name="checkbox" checked required>I agree to your <a class="w3layouts-t" href="terms.html">Terms of Use</a> and <a class="w3layouts-t" href="privacy.html" target="_blank">Privacy Policy</a></label>
                                                    </span>
                                                </div>
                                                <div class="tp">
                                                    <input type="submit" name="signup" value="REGISTER NOW">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!-- //Modal1 -->