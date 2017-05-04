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
<?php
$dbhost = 'localhost:8080';
$dbuser = 'root';
$dbpass = 'root123';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'msi';
mysql_select_db($dbname);
$id=$_SESSION["id"];
$query = "SELECT * FROM cart where id='$id'";
$result = mysql_query($query) 
or die(mysql_error()); 
print " 
<table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\" id=\"AutoNumber2\" bgcolor=\"cyan\"><tr> 
<td width=100>Product:</td> 
<td width=100>Type:</td> 
<td width=100>Brand:</td> 
<td width=100>Date Of Purchase:</td> 
</tr>"; 

while($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
print "<tr>"; 
print "<td>" . $row['product'] . "</td>"; 
print "<td>" . $row['typ'] . "</td>"; 
print "<td>" . $row['brand'] .  "</td>"; 
print "<td>" . $row['dop'] .  "</td>";
print "<td>"."<a href='complaint.php?q=".$row['pid']."'>Place Complaint</a>"."</td>";
print "</tr>"; 
} 

print "</table>"; 
?>
  <a href="logout.php"><button>logout</button></a>

<!--<li> <a href="logout.php">Log out</a></li>
	<form action="complaint.php" method="post">
     	<h1>Register your Complaint</h1>
     	<p>
            <label for="pronam"> Product Name</label>
            <input id="pro" name="pro" required="required" type="text"/>
      </p>
      
      <p>
            <label for="cmpl"> Your Complaint</label>
            <input id="cmpl" name="cmpl" required="required" type="text"/>
        </p>

        <p>
        <label for="dop"> Date Of Purchase</label>
            <input id="dop" name="dop" required="required" type="text" placeholder="2017-12-31" />
        </p>

        <p class="send button"> 
            <input type="submit" name="submit" value="send" /> 
    	</p>
     </form>-->
</body>
</html>