<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ispmsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $uid=$_SESSION['ispmsuid'];
    $name=$_POST['name'];
    $mno=$_POST['mobilenumber']; 
  $sql="update tbluser set FullName=:name,MobileNumber=:mno  where ID=:uid";
     $query = $dbh->prepare($sql);
     $query->bindParam(':name',$name,PDO::PARAM_STR);
     $query->bindParam(':mno',$mno,PDO::PARAM_STR);
     $query->bindParam(':uid',$uid,PDO::PARAM_STR);
     $query->execute();
        echo '<script>alert("Profile has been updated")</script>';
  }
  ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>User Profile</title>
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
            <span class="agile-breadcrumbs"><a href="index.php">Home</a> <span>Profile</span></span>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <div class="w3l-main-contact">
        <div class="container">
            <div class="agileinfo-contact-main-address">
                <h4 class="w3ls-inner-title">help at hand</h4>
                <p>we aim to provide our customers with best possible services. In case you have any suggestion / feedback,
                    we would be delightful to assist you at the earliest.</p>
                <div class="list_agileits_w3layouts">
                	  <form method="post" class="agile_form">
                      <?php
$uid=$_SESSION['ispmsuid'];
$sql="SELECT * from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?> 
                  
                  
                    <div class="clearfix"></div>
                </div>                <div class="agileits-main-right agile_form">
                    <h5>Fill in your details</h5>
                 
                        <div class="w3ls-text sec-left">
                            <label class="contact-form-w3ls">Name<span>*</span></label>
                            <input  value="<?php  echo $row->FullName;?>" name="name" type="text" required="true">
                        </div>  
                        <div class="w3ls-text sec-right">
                            <label class="contact-form-w3ls">Email</label>
                            <input  value="<?php  echo $row->Email;?>" name="email" type="email" required="true" readonly="true" title="Email can't be update">
                        </div>  
                        <div class="clearfix"></div>
                        <div class="w3ls-text sec-left">
                            <label class="contact-form-w3ls">Contact Number<span>*</span></label>
                            <input  value="<?php  echo $row->MobileNumber;?>"  name="mobilenumber" type="text" maxlength='10' required="true" >
                        </div>
                        <div class="section_class_agileits sec-right">
                            <label class="contact-form-w3ls">Registration Date<span>*</span></label>
                           <input  value="<?php  echo $row->RegDate;?>" readonly="true" name="" type="text">
                        </div>
                        <div class="clearfix"></div>
                        <?php $cnt=$cnt+1;}} ?>
                        <p style="padding-top: 20px;"><input type="submit" value="Update" name="submit"></p>
                       

                    </form>
		        </div>
		      
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

</html><?php }  ?>