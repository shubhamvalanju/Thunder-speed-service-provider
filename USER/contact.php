<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
if(isset($_POST['submit']))
  {
    $name=$_POST['name'];
    $email=$_POST['email'];
     $servicetype=$_POST['servicetype'];
    $enquirytype=$_POST['enquirytype'];
    $mobnum=$_POST['mobnum'];
     $city=$_POST['city'];
     $message=$_POST['message'];
    $sql="insert into tblcontact(Name,Email,ServiceType,EnquiryType,MobileNumber,City,Message)values(:name,:email,:servicetype,:enquirytype,:mobnum,:city,:message)";
$query=$dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':servicetype',$servicetype,PDO::PARAM_STR);
$query->bindParam(':enquirytype',$enquirytype,PDO::PARAM_STR);
$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   echo "<script>alert('Your message was sent successfully!.');</script>";
echo "<script>window.location.href ='contact.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Contact Us Page</title>
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
            <span class="agile-breadcrumbs"><a href="index.php">Home</a> <span>Contact Us</span></span>
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
                    <div class="section_class_agileits sec-left">
                        <label class="contact-form-w3ls">Select service type<span>*</span></label>
                        <select name="servicetype" required="true">
                            <option value=""> Select </option>
                            <option value="Digital TV">Digital TV </option>
                            <option value="Broadband">Broadband</option>   
                    </select>
                    </div>
                    <div class="section_class_agileits sec-right">
                        <label class="contact-form-w3ls">Select enquiry type<span>*</span></label>
                        <select name="enquirytype" required="true">
                            <option value="">Select </option>
                            <option value="Request">Request</option>
                            <option value="Query">Query</option>
                            <option value="Complaint">Complaint</option>
                            <option value="Feedback">Feedback</option>
				         </select>
                    </div>
                    <div class="clearfix"></div>
                </div>                <div class="agileits-main-right agile_form">
                    <h5>Fill in your details</h5>
                 
                        <div class="w3ls-text sec-left">
                            <label class="contact-form-w3ls">Mobile no.<span>*</span></label>
                            <input  placeholder="Mobile Number " name="mobnum" type="text" required="true" pattern="[0-9]+" maxlength="10">
                        </div>	
                        <div class="w3ls-text sec-right">
                            <label class="contact-form-w3ls">Email<span>*</span></label>
                            <input  placeholder="Email" name="email" type="email" required="true">
                        </div>	
                        <div class="clearfix"></div>
                        <div class="w3ls-text sec-left">
                            <label class="contact-form-w3ls">Name<span>*</span></label>
                            <input  placeholder="Full Name " name="name" type="text" required="true">
                        </div>
                        <div class="section_class_agileits sec-right">
                            <label class="contact-form-w3ls">City<span>*</span></label>
                           <input  placeholder="Enter your city " name="city" type="text" required="true">
                        </div>
                        <div class="clearfix"></div>
                        <label class="contact-form-w3ls">What would you like us to assist you with?<span>*</span></label>
                        <textarea  class="w3l_summary"  required="true" name="message" placeholder="What would you like us to assist you with?"></textarea>
                        <input type="submit" value="Submit" name="submit">
                        <p><span>*</span>marked fields are mandatory</p>

                    </form>
		        </div>
		        <br>
		        <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour" aria-expanded="true">
                            <div class="panel-body panel_text  panel-body-bb">
                                <div class="w3three-contact-left">
                                    <?php
$sql="SELECT * from tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                    <div class="address">
                                        <h5>Address:</h5>
                                        <p><i class="glyphicon glyphicon-home"></i> <?php  echo htmlentities($row->PageDescription);?></p>
                                    </div>
                                    <div class="address address-mdl">
                                        <h5>Phone:</h5>
                                        <p><i class="glyphicon glyphicon-earphone"></i> +<?php  echo htmlentities($row->MobileNumber);?></p>
                                        
                                    </div>
                                    <div class="address">
                                        <h5>Email:</h5>
                                        <p><i class="glyphicon glyphicon-envelope"></i> <a href="mailto:info@example.com"><?php  echo htmlentities($row->Email);?></a></p>
                                    </div>
                                </div><?php $cnt=$cnt+1;}} ?>
                            </div>
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

</html>