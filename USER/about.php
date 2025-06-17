<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>About Us Page</title>
    <!-- for-mobile-apps -->
    
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
    <link href="css/about.css" rel="stylesheet" type="text/css" media="all" />
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
    <div class="w3ls-banner text-center">
        <div class="container">
            <h2 class="wthree-title">time to go digital</h2>
            <h3 class="wthree-subtitle">making a better world</h3>
        </div>
    </div>
    <!-- //banner -->
    <!-- breadcrumbs -->
    <div class="w3layouts-breadcrumbs text-center">
        <div class="container">
            <span class="agile-breadcrumbs"><a href="index.php">Home</a> > <span>About us</span></span>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <div class="container">
        <!-- services section -->
        <div class="w3ls-section w3_agileits-about" id="services">
            <div class="main-about-w3ls-txt">
                <div class="col-md-6 col-sm-6 col-xs-6 agileinfo-about-img">
                    <img src="images/a4.jpg" class="img-responsive" alt="">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 agileinfo-about-txt">
                    <h4 class="info">Experience super fast Internet speed</h4>
                </div>
                <div class="clearfix"></div>
            </div>
			 <div class="main-about-w3ls-txt">
                <div class="col-md-6 col-sm-6 col-xs-6 agileinfo-about-txt">
                    <h4 class="info">Experience the next level of incredible</h4>
                </div>
				<div class="col-md-6 col-sm-6 col-xs-6 agileinfo-about-img">
                    <img src="images/dth.jpg" class="img-responsive" alt="">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="main-about-w3ls">
                <div class="col-md-8 col-sm-8 col-xs-8 agileinfo-about abt-rad">
                    <h4 class="info">Get the Best of DTH channels.<br>Feel the beauty.</h4>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 agileinfo-about-img abt-w3ls-btmimg">
                    <img src="images/p1.png" class="img-responsive" alt="">
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4 col-sm-4 col-xs-4 agileinfo-about-img abt-w3ls-btmimg">
                    <img src="images/about2.png" class="img-responsive" alt="">
                </div>
                <div class="col-md-8 col-sm-8 col-xs-8 agileinfo-about">
                    <h4 class="info">Get the Best of Internet and DTH channels on your TV</h4>
                </div>
                <div class="clearfix"></div>
				<!--team -->
<div class="team agileits-w3layouts" id="team">
	<h4 class="w3ls-inner-title">About Us</h4>
		<div class="team-w3ls">
			<div class="col-md-12 col-sm-6 col-xs-6 team-grid w3_agileits">
				<?php

$sql="SELECT * from  tblpage where PageType='aboutus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
	
				
					<p><?php  echo $row->PageDescription;?></p>
				
				<div class="clearfix"> </div>
			</div>
			
			<?php $cnt=$cnt+1;}} ?>
			
		
			
		</div>   
	</div>
<!-- //team--> 
                
             
               
            </div>

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
  
	<script src="js/SmoothScroll.min.js"></script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>


</body>

</html>