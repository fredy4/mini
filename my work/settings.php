<?php session_start();?>
<html>
<head>
		<title> Project Settings</title>
		<link rel="stylesheet" type="text/css" href="css/demo.css">
		<link rel="stylesheet" type="text/css" href="css/stylemenu.css">
		<link rel="stylesheet" type="text/css" href="css/styleeval.css">
		<script src="jquery.js"></script>
		<?php
		 if(isset($_SESSION["log"]))    
			{
			 if($_SESSION["log"]==0)
		      header("Location: index.php");
			 else if($_SESSION["type"]=="s")
			  header("Location:welcomes.php");
			 else if($_SESSION["type"]=="a")
			  header("Location:welcomea.php");			    
			}
		else
         header("Location:index.php");
     	$sql=mysql_connect("localhost","root","");
   		if(!$sql){
	   		die("Couldn't connect".mysql_error());
	  	}
   			mysql_select_db("project",$sql);
  		  	$id=$_SESSION["id"];
		?>
</head>

<body>
	<?php include("theader.php");?>
	<div id="contents">
		<div id="head">
			Managing...
		</div>
	<div id="content">
	</div>
	</div>
</body>
</html>