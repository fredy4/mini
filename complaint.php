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

	$query = "SELECT * FROM cart WHERE id='$_GET[q]'";
$result = mysql_query($query) 
or die(mysql_error()); 
while($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 

$pr= $row['product'];
$ty= $row['typ'];
$br= $row['brand'] ;
$dp= $row['dop'] ; 

}


?>
<form action="compl.php" method="GET">
<p>
  <label for="product "> Product </label>
  <input id = "product" name ="product" required ="required" type="text" value="<?php print $pr ?>">
</p>
<p>
  <label for="typ"> Type</label>
  <input id = "typ" name ="typ" required ="required" type="text" value="<?php print $ty ?>">
</p>
<p>
  <label for="brand "> Brand</label>
  <input id = "brand" name ="brand" required ="required" type="text" value="<?php print $br ?>">
</p>
<p>
  <label for="dop "> Date of Purchase</label>
  <input id = "dop" name ="dop" required ="required" type="text" value="<?php print $dp ?>">
</p>
 <p>
            <label for="cmpl"> Your Complaint</label>
            <input id="cmpl" textarea name="cmpl" required="required" type="text"/>
        </p>

     <p>
	<input id="idpk" name="idpk" type="hidden" value="<?php print $row['id']?>" >
</p>
      <p class="Send button"> 
<input type="submit" name="submit" value="Send" /> 
</p>
</form>
	</body>
	</html>
	




