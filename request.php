<?php session_start(); ?>
<!DOCTYPE html>
<html>
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
	<?php
	$ab=$_SESSION["id"];
	
$query = "SELECT * FROM complaint where brand='$ab'";
$result = mysql_query($query) 
or die(mysql_error()); 
print " 
<table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\" id=\"AutoNumber2\" bgcolor=\"cyan\"><tr> 
<td width=100>Product:</td> 
<td width=100>Type:</td> 
<td width=100>Brand:</td> 
<td width=100>Date Of Purchase:</td> 
<td width=100>Complaint:</td> 
</tr>"; 

while($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
print "<tr>"; 
print "<td>" . $row['pro_name'] . "</td>"; 
print "<td>" . $row['type'] . "</td>"; 
print "<td>" . $row['brand'] .  "</td>"; 
print "<td>" . $row['dop'] . "</td>";
print "<td>" . $row['compl'] . "</td>";
print "<td>"."<a href='work.php?q=".$row['compl_id']."'>Expand</a>"."</td>";


print "</tr>"; 
} 
print "</table>"; 
?>
      
	
	<a href="logout.php"><button>logout</button></a>

</body>

</html>