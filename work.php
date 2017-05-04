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
	
	
	
            <li> <a href="logout.php">Log out</a></li>

	<?php
$dbhost = 'localhost:8080';
$dbuser = 'root';
$dbpass = 'root123';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'msi';
mysql_select_db($dbname);

$query = "SELECT * FROM complaint WHERE compl_id='$_GET[q]'";
$result = mysql_query($query) 
or die(mysql_error()); 
while($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 

$pn= $row['pro_name'];
$ty= $row['type'];
$br= $row['brand'] ; 
$dp= $row['dop'] ;
$cm= $row['compl'];
$ci= $row['cid'];

}
 $di=$_SESSION["id"];
 
$temp=mysql_fetch_array(mysql_query("SELECT * FROM customer where id='$ci'"));
  $st=$temp["district"];
  $tempp=mysql_fetch_array(mysql_query("SELECT * FROM srvcntr where district='$st' and company='$di'"));
  $ns=$tempp["id"];

?>
<form action="notify.php" method="GET">
<p>
  <label for="product "> Product </label>
  <input id = "product" name ="product" required ="required" type="text" value="<?php print $pn ?>">
</p>
<p>
  <label for="type"> Type</label>
  <input id = "type" name ="type" required ="required" type="text" value="<?php print $ty ?>">
</p>
<p>
  <label for="brand "> Brand</label>
  <input id = "brand" name ="brand" required ="required" type="text" value="<?php print $br ?>">
</p>
<p>
  <label for="dop"> Date Of Purchase</label>
  <input id = "dop" name ="dop" required ="required" type="text" value="<?php print $dp ?>">
</p>
<p>
  <label for="comp "> Complaint</label>
  <input id = "comp" name ="comp" required ="required" type="text" value="<?php print $cm ?>">
</p>
<p>
  <label for="nsc "> Nearest Service Center</label>
  <input id = "nsc" name ="nsc" required ="required" type="text" value="<?php print $ns ?>">
</p>

      <p>
	<input id="idpk" name="idpk" type="hidden" value="<?php print $row['compl_id']?>" >
</p>
      <p class="Send button"> 
<input type="submit" name="submit" value="Send Notification" /> 
</p>
</form>


</body>

</html>