<?php session_start(); ?>
<!DOCTYPE html>
    <html style="background:url(css/bgs.jpg) no-repeat center fixed; background-size:cover">

<head>
	<title>MSI</title>
	<?php 
	if(isset($_SESSION["log"])){
	 if($_SESSION["log"]==1&&$_SESSION["type"]=="c")
	   header("Location: welcome.php");
	 elseif($_SESSION["log"]==1&&$_SESSION["type"]=="shp")
	   header("Location: welcomeshp.php");
	 elseif($_SESSION["log"]==1&&$_SESSION["type"]=="svc")
	   header("Location: welcomesvc.php");
     elseif($_SESSION["log"]==0)
        header("Location:index.php");
	}	
	else
		header("Location:index.php");

	$sql=mysql_connect("localhost","root","root123");
   if(!$sql)
  	  {
	   die("Couldn't connect".mysql_error());
	  }
  mysql_select_db("msi",$sql);
  ?>
</head>
<body>	
	<?php echo $_SESSION["id"];?>
	
	
	
            <li><a href="product.php"><button>Add your Products</button></a></li>
           <li><a href="request.php"><button>View Complaints</button></a></li>
      
	
	<a href="logout.php"><button>logout</button></a>

</body>

</html>