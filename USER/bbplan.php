<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if(isset($_GET['bbid']))
{
$planid=$_GET['bbid'];
$userid= $_SESSION['ispmsuid'];
 $bookingnumber=mt_rand(100000000, 999999999);

$sql="insert into tblbookbplan(BookingNumber,UserID,PlanID)values(:bookingnumber,:userid,:planid)";

$query=$dbh->prepare($sql);
$query->bindParam(':bookingnumber',$bookingnumber,PDO::PARAM_STR);
$query->bindParam(':userid',$userid,PDO::PARAM_STR);
$query->bindParam(':planid',$planid,PDO::PARAM_STR);
$query->execute();
$LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Your plan has been booked.")</script>';
echo "<script>window.location.href ='bbplan.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Broadband Plan</title>
    
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
    <!-- services -->
    <link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
    <!-- //services -->
    <link href="css/JiSlider.css" rel="stylesheet">
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
<!-- header -->
	<?php include_once('includes/header.php');?>
	<!-- //header -->
	
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
            <span class="agile-breadcrumbs"><a href="index.html">Home</a> >  <span>Broadband</span></span>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- //banner -->
    <div class="w3l-main-contact">
        <div class="container">
           <div class="w3three-bb-main">
                <h4 class="w3ls-inner-title">Broadband Plans</h4>
                 <h5>book your plan</h5>
                 <form method="post">
                <table class="table table-responsive">
                    <thead class="w3ls-table">
                        <tr>
                           <td>Plan</td>
                            <td>Speed</td>
                            <td>FUP (Fair Usage Policy)</td>
                            <td>Post FUP(Fair Usage Policy )</td>
                            <td>Price</td>
							<td></td>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
$sql="SELECT * from tblbroadbandplan";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>  
                        <tr><input type="hidden" name="planid" value="<?php echo $row->ID;?>"> 
                            <td class="w3ls-plan"><span><?php  echo htmlentities($row->Plan);?></span></td>
                            <td><?php  echo htmlentities($row->Speed);?></td>
                            <td><?php  echo htmlentities($row->FUP);?></td>
                            <td><?php  echo htmlentities($row->PostFUP);?></td>
							<td>₹<?php  echo htmlentities($row->Price);?></td>
                            <td class="wthree-table-enq">
                            	<?php if($_SESSION['ispmsuid']==""){?>
                            	<a href="#" class="login" data-toggle="modal" data-target="#myModal4">Book</a>
<?php } else {?>
	<a href="bbplan.php?bbid=<?php echo $row->ID;?>" class="btn btn-primary">Book Now</a>
                                                <?php } ?>
                            </td>
                        </tr> <?php $cnt=$cnt+1;}} ?>
                    </tbody>
                </table>
                </form>
                <p class="tab-bot"><span>**</span>Installation charges and taxes extra as applicable.</p>
            </div>
        </div>
    </div>
    	<!-- footer -->
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