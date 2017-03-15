<?php session_start(); ?>
<!DOCTYPE html>
<html>
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

$query = "SELECT * FROM product WHERE id='$_GET[q]'";
$result = mysql_query($query) 
or die(mysql_error()); 
print " 
<table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\" id=\"AutoNumber2\" bgcolor=\"cyan\"><tr> 
<td width=100>Company:</td> 
<td width=100>Product Name:</td> 
<td width=100>Product Type:</td> 
<td width=100>Cost:</td> 
<td width=100>Available:</td> 
<td width=100>Description:</td> 

</tr>"; 

$row = mysql_fetch_assoc($result); 

print "<tr>"; 
print "<td>" . $row['company'] . "</td>"; 
print "<td>" . $row['name'] . "</td>"; 
print "<td>" . $row['type'] .  "</td>"; 
print "<td>" . $row['cost'] . "</td>";
print "<td>" . $row['no'] . "</td>";
print "<td>" . $row['detail'] . "</td>";
print "</tr>"; 

print "</table>"; 

?>
<form action="confirm.php" method="GET">
<p>
  <label for="quantity "> Quantity</label>
  <input id = "quantity" name ="quantity" required ="required" type="text" placeholder="eg:4">
</p>
<p>
  <label for="mno">Enter your mobile number</label>
  <input id="mno" type="text" name="mno" required ="required"  placeholder="eg:9876543290">
      </p>
      <p>
	<input id="idpk" name="idpk" type="hidden" value="<?php print $row['id']?>" >
</p>
      <p class="Confirm button"> 
<input type="submit" name="submit" value="Confirm" /> 
</p>
</form>

<form action="welcome.php" method="POST">
<p class="Return button"> 
<input type="submit" name="submit" value="Return" /> 
</p>

</form>	
 </body>
</html>