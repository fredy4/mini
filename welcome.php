<?php session_start(); ?>
<!DOCTYPE html>
 <html style="background:url(css/bgs.jpg) no-repeat center fixed; background-size:cover">

<head>
	<title>MSI</title>
		<link rel="stylesheet" type="text/css" href="css/welc.css">
	<!--<link rel="stylesheet" type="text/css" href="css/demo.css">-->
	<!--<link rel="stylesheet" type="text/css" href="stylemenu.css">-->
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
	

<body style="background-color: lightblue">
<?php echo "Hi, ".$_SESSION["name"];?>
<li> <a href="logout.php"><button>Log out</button></a></li>
	
	<!--<div id="content">
	
	
	<h1>Hello Customer</h1>
	</div>-->
	<div id="do">
	<a href="complaint.php"><button> Register Complaint</button></a>
	</div>

		<?php
$dbhost = 'localhost:8080';
$dbuser = 'root';
$dbpass = 'root123';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'msi';
mysql_select_db($dbname);

$query = "SELECT * FROM product";
$result = mysql_query($query) 
or die(mysql_error()); 
print " 
<table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\" id=\"AutoNumber2\" bgcolor=\"cyan\"><tr> 
<td width=100>Company:</td> 
<td width=100>Product Name:</td> 
<td width=100>Product Type:</td> 
<td width=100>Cost:</td> 
<td width=100>Available:</td> 

<td width=100></td>
</tr>"; 

while($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
print "<tr>"; 
print "<td>" . $row['company'] . "</td>"; 
print "<td>" . $row['name'] . "</td>"; 
print "<td>" . $row['type'] .  "</td>"; 
print "<td>" . $row['cost'] . "</td>";
print "<td>" . $row['no'] . "</td>";
print "<td>"."<a href='check.php?q=".$row['id']."'>Check Out</a>"."</td>";


print "</tr>"; 
} 
print "</table>"; 
?>
	
	

</body>


</html>