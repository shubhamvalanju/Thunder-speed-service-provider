<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT Email FROM tbluser WHERE Email=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tbluser set Password=:newpassword where Email=:email and MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
}
}

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Forgot Password Page</title>
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
      <!-- pop-up -->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //pop-up -->
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- js -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!--/js-->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
	    rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic'
		rel='stylesheet' type='text/css'>
			<!-- nav smooth scroll -->
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- //nav smooth scroll -->
<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>
<body>

	<?php include_once('includes/header.php');?>
	<!-- banner -->
    <div class="w3ls-banner contact-agileinfo">
        <div class="container">
            <h2 class="w3ls-title">Need help?</h2>
            <h3 class="w3-subtitle">we're here for you!</h3>
        </div>
    </div>
    <!-- //banner -->
    <!-- breadcrumbs -->
    <div class="w3layouts-breadcrumbs text-center">
        <div class="container">
            <span class="agile-breadcrumbs"><a href="index.php">Home</a> <span>Forgot Password</span></span>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <div class="w3l-main-contact">
        <div class="container">
            <div class="agileinfo-contact-main-address">
                <h4 class="w3ls-inner-title">Forgot Password</h4>
                <p>we aim to provide our customers with best possible services. In case you have any suggestion / feedback,
                    we would be delightful to assist you at the earliest.</p>
                <div class="list_agileits_w3layouts">
                	 <form method="post" class="agile_form" name="chngpwd" onSubmit="return valid();"> 
                    
                   
                    <div class="clearfix"></div>
                </div>                <div class="agileits-main-right agile_form">
                    <h5>Fill in your details</h5>
                 
                        <div class="w3ls-text sec-left">
                            <label class="contact-form-w3ls">Mobile no.<span>*</span></label>
                            <input  placeholder="Mobile Number " name="mobile" type="text" required="true" pattern="[0-9]+" maxlength="10">
                        </div>	
                        <div class="w3ls-text sec-right">
                            <label class="contact-form-w3ls">Email<span>*</span></label>
                            <input  placeholder="Email" name="email" type="email" required="true">
                        </div>	
                        <div class="clearfix"></div>
                        <div class="w3ls-text sec-left">
                            <label class="contact-form-w3ls">New Password<span>*</span></label>
                            <input  placeholder="New Password" name="newpassword" type="password" required="true" class="form-control">
                        </div>
                        <div class="section_class_agileits sec-right">
                            <label class="contact-form-w3ls">Confirm Password<span>*</span></label>
                            <input  placeholder="Confirm Password" name="confirmpassword" type="password" required="true" class="form-control">
                        </div>
                        <div class="clearfix"></div>
                        
                        <p><input type="submit" value="Reset" name="submit"></p>
                        <p><span>*</span>marked fields are mandatory</p>

                    </form>
		        </div>
		        <br>
		        
	        </div>		
         </div>

        <div class="clearfix"></div>
        </div>

    <?php include_once('includes/footer.php');?>
	
    
				<script type="text/javascript">
					window.onload = function () {
						document.getElementById("password1").onchange = validatePassword;
						document.getElementById("password2").onchange = validatePassword;
					}
					function validatePassword(){
						var pass2=document.getElementById("password2").value;
						var pass1=document.getElementById("password1").value;
						if(pass1!=pass2)
							document.getElementById("password2").setCustomValidity("Passwords Don't Match");
						else
							document.getElementById("password2").setCustomValidity('');	 
							//empty string means no validation error
					}

			</script>
    <script src="js/SmoothScroll.min.js"></script>
    <!-- //agents section -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>

</body>

</html>