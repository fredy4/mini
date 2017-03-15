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
?>
<form action="confirm.php" method="POST">
<p>
  <label for="quantity "> Quantity</label>
  <input id = "quantity" name ="quantity" required ="required" type="text" placeholder="eg:4">
</p>
<p>
  <label for="mno">Enter your mobile number</label>
  <input id="mno" type="text" name="mno" required ="required"  placeholder="eg:9876543290">
      </p>

<?php
$query = "SELECT * FROM product WHERE id='$_GET[q]'";
$result = mysql_query($query) 
or die(mysql_error()); 
while($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
{ 
        $nam=$row["name"];
        $type=$row["type"];
        $company=$row["company"];
       //$no=$row["no"];
        $cost=$row["cost"];
        
mysql_query("INSERT INTO cart (product,typ,brand,amount)VALUES('$nam','$type','$company','$cost')");

 
}    

?>
<p>
<input id="id" name ="id" type="hidden" value="$row['id']">
</p>
<p class="Confirm button"> 
<input type="submit" name="submit" value="Confirm" /> 
</p>
</form>


</body>
</html>