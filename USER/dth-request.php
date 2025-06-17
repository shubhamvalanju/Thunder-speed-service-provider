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
	<title>DTH Request</title>
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
            <span class="agile-breadcrumbs"><a href="index.php">Home</a> <span>DTH Request</span></span>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <div class="w3l-main-contact">
        <div class="container">
            <div class="agileinfo-contact-main-address">
                <h4 class="w3ls-inner-title">DTH Requests</h4>
                <p>we aim to provide our customers with best possible services. In case you have any suggestion / feedback,
                    we would be delightful to assist you at the earliest.</p>
                <div class="list_agileits_w3layouts">
                	  <table border="1" class="table table-responsive">
                                    <thead>
                                         <tr><th>S.No</th>
                                            <th>Booking Number</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Plan Name</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       
                                        <tr><?php
                                          $uid=$_SESSION['ispmsuid'];
$sql="SELECT tbluser.FullName,tbluser.ID as uid,tbluser.MobileNumber,tbluser.Email,tbldthplan.DTHPlan,tblbookdthplan.BookingNumber,tblbookdthplan.Status,tblbookdthplan.Assign,tblbookdthplan.ID as bpid from  tblbookdthplan join tbluser on tbluser.ID=tblbookdthplan.UserID join tbldthplan on tbldthplan.ID=tblbookdthplan.PlanID where tbluser.ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php  echo htmlentities($row->BookingNumber);?></td>
                                        <td><?php  echo htmlentities($row->FullName);?></td>
                                             <td><?php  echo htmlentities($row->MobileNumber);?></td>
                                             <td><?php  echo htmlentities($row->Email);?></td>
                                          <td><?php  echo htmlentities($row->DTHPlan);?></td>
                                          <?php if($row->Status==""){ ?>
                     <td><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row->Status);?> (Assign To <?php  echo htmlentities($row->Assign);?>)
                  </td>
                  <?php } ?>              
                                            <td>
                                                <a href="view-dthbooking-detail.php?editid=<?php echo htmlentities ($row->bpid);?>&&bookid=<?php echo htmlentities ($row->BookingNumber);?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    <?php $cnt=$cnt+1;}} else {?>
                                        <tr>
                                            <th colspan="8" style="color:red;"> No Record found</th>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
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