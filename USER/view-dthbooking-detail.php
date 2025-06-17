<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['ispmsuid']==0)) {
  header('location:logout.php');
  } else{

  ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>view dth booking detail</title>
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
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}   

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
            <span class="agile-breadcrumbs"><a href="index.php">Home</a> <span>Change Password</span></span>
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
                    <?php
                  $eid=$_GET['editid'];
$sql="SELECT tbluser.FullName,tbluser.MobileNumber,tbluser.Email,tbldthplan.DTHPlan,tbldthplan.Channels,tbldthplan.PlanPrice,tbldthplan.Duration,tbldthplan.Features,tbldthplan.Description,tblbookdthplan.BookingNumber,tblbookdthplan.Status,tblbookdthplan.Assign,tblbookdthplan.Remark,tblbookdthplan.BookingDate,tblbookdthplan.ID as bpid from  tblbookdthplan join tbluser on tbluser.ID=tblbookdthplan.UserID join tbldthplan on tbldthplan.ID=tblbookdthplan.PlanID where tblbookdthplan.ID=:eid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':eid', $eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                	  <table border="1" class="table table-responsive">
                                   <tr><td style="font-size: 20px;color: blue;text-align: center;" colspan="6">User Details</td></tr>
                                            <tr>
    <th>Booking Number</th>
    <td><?php  echo $bookid= $row->BookingNumber;?></td>
    <th>Name of User</th>
    <td><?php  echo $row->FullName;?></td>
  </tr>
  

  <tr>
    <th>User Mobile Number</th>
    <td><?php  echo $row->MobileNumber;?></td>
    <th>User Email</th>
    <td><?php  echo $row->Email;?></td>
  </tr>
  <tr><td style="font-size: 20px;color: blue;text-align: center;" colspan="6">Plan Taken</td></tr>
  <tr>
    <th>Name of Plan</th>
    <td><?php  echo $row->DTHPlan;?></td>
    <th>Available Channels</th>
    <td><?php  echo $row->Channels;?></td>
  </tr>
   <tr>
    <th>Duration</th>
    <td><?php  echo $row->Duration;?></td>
    <th>Features</th>
    <td><?php  echo $row->Features;?></td>
  </tr>
   <tr>
    <th>Plan Description</th>
    <td><?php  echo $row->Description;?></td>
    <th>Price</th>
    <td>₹<?php  echo $row->PlanPrice;?></td>
  </tr>
  <tr><td style="font-size: 20px;color: blue;text-align: center;" colspan="6">Action Taken By Admin</td></tr>
   <tr>
    <th >Assign To</th>
    <?php if($row->Assign==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row->Assign);?>
                  </td>
                  <?php } ?>       
    <th>Booking Date</th>
    <td><?php  echo $row->BookingDate;?></td>
  </tr>
  <tr>
    
     <th>Booking Final Status</th>

    <td > <?php  $status=$row->Status;
    
if($row->Status=="Assign")
{
  echo "Assigned";
}

if($row->Status=="Rejected")
{
 echo "Your booking request has been cancelled";
}
if($row->Status=="Completed")
{
 echo "Completed";
}

if($row->Status=="")
{
  echo "Not Response Yet";
}


     ;?></td>
     <th >Admin Remark</th>
    <?php if($row->Status==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row->Remark);?>
                  </td>
                  <?php } ?> 
  </tr>
   
 
<?php $cnt=$cnt+1;}} ?>
   
 

                                </table>
                                <?php 
$bookid=$_GET['bookid']; 
   if($status!=""){
$ret="select tbltracking.Remark,tbltracking.Status as astatus,tbltracking.UpdationDate from tbltracking where tbltracking.ApplicationNumber =:bookid";
$query = $dbh -> prepare($ret);
$query-> bindParam(':bookid', $bookid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="4" style="color: blue" >Tracking History</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Remark</th>
<th>Status</th>
<th>Time</th>
</tr>
<?php  
foreach($results as $row)
{               ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row->Remark;?></td> 
  <td><?php  echo $row->astatus;

  ?></td> 
   <td><?php  echo $row->UpdationDate;?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
<?php  }  
?>
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