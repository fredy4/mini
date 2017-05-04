<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>MSI</title>
	<?php 
	if(isset($_SESSION["log"])){
	 if($_SESSION["log"]==1&&$_SESSION["type"]=="c")
	   header("Location: welcome.php");
	 elseif($_SESSION["log"]==1&&$_SESSION["type"]=="co")
	   header("Location: welcomeco.php");
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

<?php
//echo "Hi, ".$_SESSION["id"];
$wq=$_SESSION["id"];
$query =mysql_fetch_array(mysql_query( "SELECT * FROM shop where id='$wq'"));


//$abc=$_SESSION["nationality"];
$temppp=mysql_fetch_array(mysql_query("SELECT * FROM shop where level='0'"));
  $mgm=$temppp['level'];
  //print "$mgm";
  $abc=$_SESSION["state"];
$ab=$_SESSION["district"];
$qrry =mysql_fetch_array(mysql_query( "SELECT * FROM state where state='$abc'"));
    $gm=$qrry['code'];
   // print "$gm";
     $querry =mysql_fetch_array(mysql_query( "SELECT * FROM district where district='$ab'"));
            $mg=$querry['code'];
           //print "$mg";

$a=$mgm.$gm.$mg;
$b=$mgm.$gm;
$c=$mgm;
//print "$a";
//print "$b";
//print "$c";

if ($query['status']=="inactive"){
echo "<script> alert('This account has not been activated'); window.location. href = 'index.php'; </script>";	
}

elseif($query['level']=="$a")
    {
     echo "Hi, ".$_SESSION["id"];
    
$dist=$_SESSION["district"];
     $query = "SELECT * FROM cart where district='$dist'";
$result = mysql_query($query) 
or die(mysql_error()); 
print " <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\" id=\"AutoNumber2\" bgcolor=\"cyan\"><tr>

<td width=100>Customer ID:</td> 
<td width=100>Product:</td> 
<td width=100>Type:</td> 
<td width=100>Brand:</td> 
<td width=100>Amount:</td> 
<td width=100>Quantity:</td>


</tr>"; 


while($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 

print "<tr>"; 
print "<td>" . $row['id'] . "</td>"; 
print "<td>" . $row['product'] . "</td>"; 
print "<td>" . $row['typ'] . "</td>"; 
print "<td>" . $row['brand'] .  "</td>"; 
print "<td>" . $row['amount'] . "</td>";
print "<td>" . $row['quantity'] . "</td>";

}
}
elseif($query['level']=="$b")
    {
     echo "Hi, ".$_SESSION["id"];
    $query = "SELECT * FROM shop where status='inactive' and state='$abc'";
$result = mysql_query($query) 
or die(mysql_error()); 
print " <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\" id=\"AutoNumber2\" bgcolor=\"cyan\"><tr>
<td width=100>Shop Name:</td> 
<td width=100>Shop ID:</td> 
<td width=100>Shop Address:</td> 
<td width=100>Shop District:</td> 
<td width=100>Shop State:</td> 

<td width=100></td>
</tr>"; 


while($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 

print "<tr>"; 
print "<td>" . $row['name'] . "</td>"; 
print "<td>" . $row['id'] . "</td>"; 
print "<td>" . $row['address'] .  "</td>"; 
print "<td>" . $row['district'] . "</td>";
print "<td>" . $row['state'] . "</td>";


print "<td>"."<a href='activates.php?q=".$row['id']."'>Activate</a>"."</td>";


print "</tr>"; 
}
print "</table>";
}



elseif($query['level']=="$c")
{
     echo "Hi, ".$_SESSION["id"];
    $query = "SELECT * FROM shop where status='inactive' and nationality='INDIA'";
$result = mysql_query($query) 
or die(mysql_error()); 
print " <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\" id=\"AutoNumber2\" bgcolor=\"cyan\"><tr>
<td width=100>Shop Name:</td> 
<td width=100>Shop ID:</td> 
<td width=100>Shop Address:</td> 
<td width=100>Shop District:</td> 
<td width=100>Shop State:</td> 

<td width=100></td>
</tr>"; 


while($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 

print "<tr>"; 
print "<td>" . $row['name'] . "</td>"; 
print "<td>" . $row['id'] . "</td>"; 
print "<td>" . $row['address'] .  "</td>"; 
print "<td>" . $row['district'] . "</td>";
print "<td>" . $row['state'] . "</td>";


print "<td>"."<a href='activaten.php?q=".$row['id']."'>Activate</a>"."</td>";


print "</tr>"; 
}
print "</table>";
}
elseif ($query['status']=="active"){
     echo "Hi, ".$_SESSION["id"];

}

?>
<a href="logout.php"><button>logout</button></a>

</body>
</html>
