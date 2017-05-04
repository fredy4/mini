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
while($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 

$co= $row['company'];
$na= $row['name'];
$ty= $row['type'] ; 
$cos= $row['cost'] ;
$no= $row['no'] ;
$de= $row['detail'];
}


?>
<form action="confirm.php" method="GET">
<p>
  <label for="company "> Company </label>
  <input id = "company" name ="company" required ="required" type="text" value="<?php print $co ?>">
</p>
<p>
  <label for="name"> Name</label>
  <input id = "name" name ="name" required ="required" type="text" value="<?php print $na ?>">
</p>
<p>
  <label for="type "> Type</label>
  <input id = "type" name ="type" required ="required" type="text" value="<?php print $ty ?>">
</p>
<p>
  <label for="cost"> Cost</label>
  <input id = "cost" name ="cost" required ="required" type="text" value="<?php print $cos ?>">
</p>
<p>
  <label for="no "> Available</label>
  <input id = "no" name ="no" required ="required" type="text" value="<?php print $no ?>">
</p>
<p>
  <label for="detail"> Description</label>
  <input id = "detail" name ="detail" required ="required" type="text" value="<?php print $de ?>">
</p>
<p>
  <label for="quantity">Quantity Required</label>
  <input id="quantity" name="quantity" type="text" required ="required"  placeholder="eg:5">
      </p>
      <p>
  <label for="dop">Date Of Purchase</label>
  <input id="dop" name="dop" type="text" required ="required"  placeholder="eg:2012-12-31 ">
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