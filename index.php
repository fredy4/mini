<?php session_start(); ?>

<html>
<head>
	
	
	<title>MSI</title>
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
   <link rel="stylesheet" type="text/css" href="engine1/style.css" />
   <link rel="stylesheet" type="text/css" href="css/stylehome.css"/>
   <link rel="stylesheet" type="text/css" href="css/stylemenu.css"/>
   <script type="text/javascript" src="engine1/jquery.js"></script>
		<?php 
		
	
	unset($_SESSION["log"]);
	unset($_SESSION["type"]);
	if(isset($_SESSION["log"])){
	 if($_SESSION["log"]==1&&$_SESSION["type"]=="c")
	   header("Location: welcome.php");
	 if($_SESSION["log"]==1&&$_SESSION["type"]=="co")
	   header("Location: welcomeco.php");
	 if($_SESSION["log"]==1&&$_SESSION["type"]=="shp")
	   header("Location: welcomeshp.php");
	 if($_SESSION["log"]==1&&$_SESSION["type"]=="svc")
	   header("Location: welcomesvc.php");
}
	
	?>
	</head>

	<body>
 
 <?php include("iheader.php"); ?>
	<div class="contains">
	 <!-- Start Slide --> 
	  <div id="wowslider-container1">
		<div class="ws_images"><ul>
			<li><img src="data1/images/1.jpg" alt="1" title="1" id="wows1_0"/></li>
			<li><img src="data1/images/2.jpg" alt="2" title="2" id="wows1_1"/></li>
			<li><img src="data1/images/3.jpg" alt="3" title="3" id="wows1_2"/></li>
			<li><img src="data1/images/10.jpg" alt="10" title="10" id="wows1_3"/></li>
			<li><img src="data1/images/15.jpg" alt="15" title="15" id="wows1_4"/></li>
		</ul></div>
		<div class="ws_bullets"><div>
			<a href="#" title="1">1</a>
			<a href="#" title="2">2</a>
			<a href="#" title="3">3</a>
			<a href="#" title="10">4</a>
			<a href="#" title="15">5</a>
	    </div></div>
	    <span class="wsl"><a href="http://wowslider.com">Slide Show for Website</a> by WOWSlider.com v4.8</span>
	    <div class="ws_shadow"></div>
        </div>
	    <script type="text/javascript" src="engine1/wowslider.js"></script>
	    <script type="text/javascript" src="engine1/script.js"></script>
	    <!-- End WOWSlider.com BODY section -->
	  <div class="contents">
	      <div id="sbar">
	         Hai guys...... i’m machine service manager and i can help you to make your machine purchase and service a lot easier. You can become the member by signing up. You can view the items you want to purchase online and order online.The nearby shops will deliver you the item and payment can be done on delivery. All the customer activities are given as notifications to the manager. The service reminder of the machine is send automatically to the email of the customer.If the customer has any complaints they can register online and the corresponding dealer will be reported with the problem.    </div>
	      <div id="rbar">
	        Just register and  experience the different way of customer manager relation.
	      </div>
	    </div>
	    </div>
<?php include("footer.php"); ?>
</body>

</html>
 