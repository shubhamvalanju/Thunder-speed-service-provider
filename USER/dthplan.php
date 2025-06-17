<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if(isset($_GET['dthid']))
{
$planid=$_GET['dthid'];
$userid= $_SESSION['ispmsuid'];
 $bookingnumber=mt_rand(100000000, 999999999);

$sql="insert into tblbookdthplan(BookingNumber,UserID,PlanID)values(:bookingnumber,:userid,:planid)";
$query=$dbh->prepare($sql);
$query->bindParam(':bookingnumber',$bookingnumber,PDO::PARAM_STR);
$query->bindParam(':userid',$userid,PDO::PARAM_STR);
$query->bindParam(':planid',$planid,PDO::PARAM_STR);
$query->execute();
$LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Your plan has been booked.")</script>';
echo "<script>window.location.href ='dthplan.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>DTH Cable Plan</title>
	
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
	<!-- services -->
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
		<!-- pop-up -->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //pop-up -->
    <link href="css/services.css" rel="stylesheet" type="text/css" media="all" />
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
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
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
	<div class="w3ls-banner products-agileinfo">
		<div class="container">
            <h2 class="w3ls-title">3D Visual.</h2>
            <h3 class="w3-subtitle">Feel the Beauty!</h3>
        </div>
	</div>
	<!-- //banner -->
	<!-- breadcrumbs -->
	<div class="w3layouts-breadcrumbs text-center">
		<div class="container">
			<span class="agile-breadcrumbs"><a href="index.php">Home</a> > <a href="products.html">Digital Cable Tv</a> > <span>Channels & Packs</span></span>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<div class="container">
        <div class="w3ls-section">
		<div class="col-md-4 col-sm-4 col-xs-4 agileinfo-about-img abt-w3ls-btmimg">
			<img src="images/about2.png" class="img-responsive" alt="" />
		</div>
		<div class="col-md-8 col-sm-8 col-xs-8 agileinfo-about">
			<h4 class="info">Get the best of internet and DTH channels on your TV</h4>
		</div>
		<div class="clearfix"></div>
            <!-- services -->
	<div id="services" class="services jarallax">
		
			<h4 class="w3ls-inner-title">Entertainment Packages</h4>
			<?php
$sql="SELECT * from tbldthplan";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
			<div class="w3-services-grids">
				
				<div class="col-md-6 col-sm-6 col-xs-6 w3l-services-grid">
					<form method="post">
						<div class="col-md-6 w3ls-services-img">
							<input type="hidden" name="planid" value="<?php echo $row->ID;?>">
							<i class="fa fa-television" aria-hidden="true"></i>
							<h4><?php echo $row->DTHPlan;?></h4>
							<h5><?php echo $row->Channels;?> Channels</h5>
							<p>Features: <?php echo $row->Features;?>.</p>
							<p>Price: ₹<?php echo $row->PlanPrice;?>.</p>
							<p>Duration: <?php echo $row->Duration;?>.</p>
						</div>
						<div class="col-md-6 agileits-services-info">
							<h6 class="w3ls-pack-title">select a pack</h6>
							<p><?php echo $row->Description;?></p>
													<?php if($_SESSION['ispmsuid']==""){?>
                            <a href="#" class="login" data-toggle="modal" data-target="#myModal4">Book</a>
<?php } else {?>
<a href="dthplan.php?dthid=<?php echo $row->ID;?>"class="btn btn-primary">Book Now</a>
                                                <?php } ?>
					</div>
				</div><?php $cnt=$cnt+1;}} ?>
 </form>
				<div class="clearfix"></div>
			</div>
	</div>
	<!-- //services -->

        </div>
		
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
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/bootstrap.js"></script>


</body>

</html>