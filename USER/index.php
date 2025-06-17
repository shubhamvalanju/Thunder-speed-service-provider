<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Home Page</title>
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
	<!-- services -->
	<!-- pop-up -->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //pop-up -->
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
	<!-- banner -->
	<div class="banner-silder">
		<div id="JiSlider" class="jislider">
			<ul>

				<li>
					<div class="w3layouts-banner-top">

						<div class="container">
							<div class="agileits-banner-info">

								<h3>Welcome to Thunder Speed Internet Service Provider</h3>
								<p>Ready To Experience High Speed Internet.</p>

							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="w3layouts-banner-top w3layouts-banner-top1">
						<div class="container">
							<div class="agileits-banner-info">
								<h3>Time to go Digital</h3>
								<p>Experience Digital India.</p>
								
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="w3layouts-banner-top w3layouts-banner-top2">
						<div class="container">
							<div class="agileits-banner-info">
								<h3>Enjoy free live TV</h3>
								<p>Extreme Clarity Of Movies.</p>
							</div>

						</div>
					</div>
				</li>
				<li>
					<div class="w3layouts-banner-top w3layouts-banner-top3">
						<div class="container">
							<div class="agileits-banner-info">
								<h3>Exclusive Digital services</h3>
								<p>24/7 Tech Support.</p>

							</div>

						</div>
					</div>
				</li>

			</ul>
		</div>
	</div>
	<!-- //banner -->
	<div class="container">
		<!-- services section -->
		<div class="w3ls-section w3_agileits-services" id="services">
			<?php
$sql="SELECT * from tblpage where PageType='aboutus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
			<h2 class="agileits-title"><?php  echo htmlentities($row->PageTitle);?></h2>
			
			<p><?php  echo $row->PageDescription;?>.</p><?php }} ?>

		</div>
		<script src="js/easy-responsive-tabs.js"></script>
		<script>
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion           
					width: 'auto', //auto or any width like 600px
					fit: true, // 100% fit in a container
					closed: 'accordion', // Start closed if in accordion view
					activate: function (event) { // Callback function if tab is switched
						var $tab = $(this);
						var $info = $('#tabInfo');
						var $name = $('span', $info);
						$name.text($tab.text());
						$info.show();
					}
				});
				$('#verticalTab').easyResponsiveTabs({
					type: 'vertical',
					width: 'auto',
					fit: true
				});
			});
		</script>
		<!-- //agents section -->
		<!-- markets -->
		<div class="w3ls-section markets" id="markets">
			<div class="markets-grids">
				<div class="col-md-3 col-sm-6 col-xs-6 w3ls-markets-grid text-center">
					<div class="agileits-icon-grid">
						<div class="icon-left">
							<i class="fa fa-wifi" aria-hidden="true"></i>
						</div>
						<div class="icon-right">
							<h5>Would Suspend</h5>
							<p>Phasellus dapibus felis elit, sed accumsan arcu gravida vitae.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 w3ls-markets-grid text-center">
					<div class="agileits-icon-grid">
						<div class="icon-left">
							<i class="fa fa-cog" aria-hidden="true"></i>
						</div>
						<div class="icon-right">
							<h5>Aliquam</h5>
							<p>Phasellus dapibus felis elit, sed accumsan arcu gravida vitae.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 w3ls-markets-grid text-center">
					<div class="agileits-icon-grid">
						<div class="icon-left">
							<i class="fa fa-television" aria-hidden="true"></i>
						</div>
						<div class="icon-right">
							<h5>Consectetur</h5>
							<p>Phasellus dapibus felis elit, sed accumsan arcu gravida vitae.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-6 w3ls-markets-grid text-center">
					<div class="agileits-icon-grid">
						<div class="icon-left">
							<i class="fa fa-tasks" aria-hidden="true"></i>
						</div>
						<div class="icon-right">
							<h5>Bibendum</h5>
							<p>Phasellus dapibus felis elit, sed accumsan arcu gravida vitae.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- //markets -->

		<!-- offers -->
		<div class="w3ls-section offers">
			<div class="offers-grids">
				<div class="wthree-offers-right">
					<div class="col-md-7  col-sm-8 col-xs-8 wthree-offers1-right">
						<h4>CityLine | Digital Networks Broadband</h4>
						<p>Phasellus dapibus felis elit, sed accumsan arcu gravida vitae.</p>
						<ul>
							<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Phasellus sem leo, interdum quis risus</a></li>
							<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Nullam egestas nisi id malesuada aliquet </a></li>
							<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Donec condimentum purus urna venenatis</a></li>
							<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Ut congue, nisl id tincidunt lobor mollis</a></li>
							<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Cum sociis natoque penatibus et magnis</a></li>
						</ul>
					</div>
					<div class="col-md-5 col-sm-4  col-xs-4 wthree-offers1">
						<img src="images/bg.jpg" alt="" class="img-responsive" />
					</div>

					<div class="clearfix"> </div>
				</div>
				<div class="w3ls-offers-main">
					<div class="col-md-5  col-sm-4 col-xs-4 wthree-offers1">
						<img src="images/sat.png" alt="" class="img-responsive" />
					</div>
					<div class="col-md-7  col-sm-8 col-xs-8 wthree-offers-left">
						<div class="offers-left-heading">
							<h4>CityLine | Digital Networks DTH</h4>
							<h5>Phasellus dapibus felis elit, sed accumsan arcu gravida vitae.</h5>
						</div>
						<div class="offers-left-grids">
							<div class="offers-number">
								<p>1</p>
							</div>
							<div class="offers-text">
								<p>Integer egestas non lorem eget aliquet. Nulla egestas felis et maximus elementum. Morbi a dui ac nunc mollis rhoncus.</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="offers-left-grids offers-left-middle">
							<div class="offers-number">
								<p>2</p>
							</div>
							<div class="offers-text">
								<p>Integer egestas non lorem eget aliquet. Nulla egestas felis et maximus elementum. Morbi a dui ac nunc mollis rhoncus.</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="offers-left-grids">
							<div class="offers-number">
								<p>3</p>
							</div>
							<div class="offers-text">
								<p>Integer egestas non lorem eget aliquet. Nulla egestas felis et maximus elementum. Morbi a dui ac nunc mollis rhoncus.</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- offers -->
		<div class="service-bottom">
				<div class="services-w3ls-row agileits-w3layouts">
					<div class="col-md-3 col-sm-3 col-xs-6 services-grid agileits-w3layouts text-center">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<h5>Inquiry</h5>

					</div>
					<div class="col-md-3 col-sm-3 col-xs-6 services-grid agileits-w3layouts text-center">
						<i class="fa fa-comments" aria-hidden="true"></i>
						<h5>24/7 Support</h5>

					</div>
					<div class="col-md-3 col-sm-3 col-xs-6 services-grid agileits-w3layouts text-center">
						<i class="fa fa-question" aria-hidden="true"></i>
						<h5>faqs</h5>

					</div>
					<div class="col-md-3 col-sm-3 col-xs-6 services-grid agileits-w3layouts text-center">
						<i class="fa fa-list-alt" aria-hidden="true"></i>
						<h5>quick pay bill</h5>

					</div>
					<div class="clearfix"> </div>
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
	<!-- //js -->
	<script src="js/JiSlider.js"></script>
	<script>
		$(window).load(function () {
			$('#JiSlider').JiSlider({
				color: '#fff',
				start:1,
				reverse: false
			}).addClass('ff')
		})
	</script>
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-36251023-1']);
		_gaq.push(['_setDomainName', 'jqueryscript.net']);
		_gaq.push(['_trackPageview']);

		(function () {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
		})();
	</script>
	<script src="js/SmoothScroll.min.js"></script>


	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/bootstrap.js"></script>


</body>

</html>