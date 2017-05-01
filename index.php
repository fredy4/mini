<?php session_start(); ?>

<html style="background:url(css/bgs.jpg) no-repeat center fixed; background-size:cover ">
<head>
	
	
	<title>MSI</title>
	<link rel="stylesheet" type="text/css" href="css/demo.css">
	<link rel="stylesheet" type="text/css" href="css/navs.css">
   <link rel="stylesheet" type="text/css" href="engine1/style.css">
   <link rel="stylesheet" type="text/css" href="css/stylehome.css">
   <link rel="stylesheet" type="text/css" href="css/stylemenu.css">
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
   
	<ul>
  <li><a href="about.php">About</a></li>
 
 
  <li class="dropdown" style="float:right;width:auto">
    <a href="javascript:void(0)" class="dropbtn">Login</a>
    <div class="dropdown-content">
      <a href="loginshp.php">Shop</a>
      <a href="loginsvc.php">Service Centre</a>
      <a href="loginco.php">Company</a>
      <a href="loginc.php">Customer</a>
    </div>
   
    <li class="dropdown" style="float:right;width:auto">
    <a href="javascript:void(0)" class="dropbtn">Signup</a>
    <div class="dropdown-content">
      <a href="sgnshp.php">Shop</a>
      <a href="sgnsvc.php">Service Centre</a>
      <a href="sgnco.php">Company</a>
      <a href="sgnc.php">Customer</a>
    </div>
  </li>
  <li><a href="contact.php">Contact</a></li>
 
</ul>
 
 <!--<div class="topnav" id="myTopnav">
  <a href="#home">Home</a>
  <a href="#about">About</a>
  <a style="float:right" href="#contact">Contact</a>
  <a style="float:right;width:auto">Signup</a>
  <a style="float:right;width:auto">Login</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div> 
-->

 
	<div class="contains">
	 <!-- Start Slide --> 
	  <div id="wowslider-container1">
		<div class="ws_images"><ul>
			<li><img src="images/1.jpg" alt="1" title="1" id="wows1_0"/></li>
			<li><img src="images/2.jpg" alt="2" title="2" id="wows1_1"/></li>
			<li><img src="images/3.jpg" alt="3" title="3" id="wows1_2"/></li>
			<li><img src="images/4.jpg" alt="4" title="4" id="wows1_3"/></li>
			<li><img src="images/5.jpg" alt="5" title="5" id="wows1_4"/></li>
		</ul></div>
		<div class="ws_bullets"><div>
			<a href="#" title="1">1</a>
			<a href="#" title="2">2</a>
			<a href="#" title="3">3</a>
			<a href="#" title="4">4</a>
			<a href="#" title="5">5</a>
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
</body>

</html>
 