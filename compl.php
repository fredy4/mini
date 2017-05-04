<?php session_start(); ?>
<!DOCTYPE html>
    <html style="background:url(css/bgs.jpg) no-repeat center fixed; background-size:cover">

<head>
<title>MSI</title>
	<?php 
	if(isset($_SESSION["log"])){
	
	 if($_SESSION["log"]==1&&$_SESSION["type"]=="co")
	   header("Location: welcomeco.php");
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
	<?php echo "Hi, ".$_SESSION["name"];?>
	<li> <a href="logout.php">Log out</a></li>

  <?php
$dbhost = 'localhost:8080';
$dbuser = 'root';
$dbpass = 'root123';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'msi';
mysql_select_db($dbname);
$idpc = $_GET['idpk'];
$query = "SELECT * FROM cart WHERE pid='$idpc'" ;
$result = mysql_query($query) or die(mysql_error()); 
$row = mysql_fetch_assoc($result); 
 
      $pro=$_GET["product"];
      $co=$_GET["cmpl"];
        $ty=$_GET["typ"];
        $br=$_GET["brand"];
       //$no=$row["no"];
        $dp=$_GET["dop"];
        $id=$_SESSION["id"];
        
mysql_query("INSERT INTO complaint (compl,pro_name,type,brand,dop,cid)VALUES('$co','$pro','$ty','$br','$dp','$id')");


?>
Your complaint has been registered successfully. We will Contact you shortly...
	</body>
	</html>
	




